<?php

namespace App\Repositories;

use App\Models\Sale;
use App\Repositories\Contracts\SaleRepositoryInterface;

class SaleRepository implements SaleRepositoryInterface
{

    /**
     * Create sale
     * 
     * @param int $userId
     * 
     * @return Sale
     */
    public function create($userId)
    {
        return Sale::create([
            'user_id' => $userId,
            'status' => Sale::SUCCESSFUL
        ]);
    }
}
