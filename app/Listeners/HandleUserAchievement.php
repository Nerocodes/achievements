<?php

namespace App\Listeners;

use App\Events\AchievementUnlocked;
use App\Events\NewPurchase;
use App\Repositories\AchievementRepository;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class HandleUserAchievement
{
    private $userRepository, $achievementRepository;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepository, AchievementRepository $achievementRepository)
    {
        $this->userRepository = $userRepository;
        $this->achievementRepository = $achievementRepository;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(NewPurchase $event)
    {
        $userId = $event->userId;

        $user = $this->userRepository->getUserById($userId);

        $noOfPurchases = $user->purchases()->count();

        $achievement = $this->achievementRepository->getAchievementByPurchaseRequirement($noOfPurchases);

        if (!$achievement) return;

        $userAchievement = $user->achievements()->where('achievement_id', $achievement->id)->first();

        if ($userAchievement) return;

        $user->achievements()->attach($achievement->id);

        event(new AchievementUnlocked($achievement->name, $user));
    }
}
