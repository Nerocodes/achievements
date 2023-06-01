<?php

namespace App\Repositories;

use App\Models\Achievement;
use App\Repositories\Contracts\AchievementRepositoryInterface;

class AchievementRepository implements AchievementRepositoryInterface
{

    /**
     * Get achievement by purchase requirement
     * 
     * @param int $purchasesCount
     * 
     * @return Achievement
     */
    public function getAchievementByPurchaseRequirement($purchasesCount)
    {
        return Achievement::where('purchase_requirement', $purchasesCount)->first();
    }
}
