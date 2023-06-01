<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

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
        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }

    /**
     * Get user by id
     * 
     * @param int $userId
     */
    public function getUserById($userId)
    {
        return User::find($userId);
    }
}
