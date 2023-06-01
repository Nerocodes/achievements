<?php

namespace App\Services;

use App\Models\Achievement;
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

        return [
            'unlocked_achievements' => $unlockedAchievements,
            'next_available_achievements' => $nextAvailableAchievements
        ];
    }
}