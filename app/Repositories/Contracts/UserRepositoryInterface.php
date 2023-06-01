<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function create($data);

    public function getUserById($userId);
}
