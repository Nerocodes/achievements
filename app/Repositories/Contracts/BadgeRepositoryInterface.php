<?php

namespace App\Repositories\Contracts;

interface BadgeRepositoryInterface
{
    public function getBadgeByAchievementRequirement($achievementCount);
}
