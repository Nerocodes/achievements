<?php

namespace App\Repositories\Contracts;

interface AchievementRepositoryInterface
{
    public function getAchievementByPurchaseRequirement($purchasesCount);
}
