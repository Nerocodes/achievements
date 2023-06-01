<?php

namespace App\Repositories;

use App\Models\Badge;
use App\Repositories\Contracts\BadgeRepositoryInterface;

class BadgeRepository implements BadgeRepositoryInterface
{

    /**
     * Get achievement by purchase requirement
     * 
     * @param int $purchasesCount
     * 
     * @return Achievement
     */
    public function getBadgeByAchievementRequirement($achievementCount)
    {
        return Badge::where('achievement_requirement', $achievementCount)->first();
    }
}
