<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    /**
     * Create user
     * 
     * @param object $data
     * 
     * @return User
     */
    public function create($data)
    {
        return User::create($data);
    }
}
