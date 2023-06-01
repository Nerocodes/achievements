<?php

namespace App\Listeners;

use App\Events\AchievementUnlocked;
use App\Events\BadgeUnlocked;
use App\Repositories\Contracts\BadgeRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class HandleUserBadge
{
    private $badgeRepository;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(BadgeRepositoryInterface $badgeRepository)
    {
        $this->badgeRepository = $badgeRepository;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(AchievementUnlocked $event)
    {
        $user = $event->user;

        $noOfAchievements = $user->achievements()->count();

        $badge = $this->badgeRepository->getBadgeByAchievementRequirement($noOfAchievements);

        if (!$badge) return;

        $userBadge = $user->badges()->where('badge_id', $badge->id)->first();

        if ($userBadge) return;

        $user->badges()->attach($badge->id);

        event(new BadgeUnlocked($badge->name, $user));
    }
}
