<?php

namespace App\Services;

use App\Models\Achievement;
use App\Models\Badge;
use App\Repositories\Contracts\UserRepositoryInterface;

class AchievementService
{

    private $userRepository;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Get user achievement details
     *
     * @param int $userId
     * @return array
     */
    public function getUserAchievementDetails($userId)
    {
        $user = $this->userRepository->getUserById($userId);

        $unlockedAchievements = $user->achievements()->pluck('name');

        $nextAvailableAchievements = Achievement::whereDoesntHave('users', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->pluck('name');

        $currentBadge = $user->badges()->latest('user_badges.id')->pluck('name')->first();

        $nextBadge = Badge::whereDoesntHave('users', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->first();
        
        $remainingToUnlockNextBadge = $nextBadge->achievement_requirement - count($unlockedAchievements);

        return [
            'unlocked_achievements' => $unlockedAchievements,
            'next_available_achievements' => $nextAvailableAchievements,
            'current_badge' => $currentBadge,
            'next_badge' => $nextBadge->name,
            'remaining_to_unlock_next_badge' => $remainingToUnlockNextBadge
        ];
    }
}