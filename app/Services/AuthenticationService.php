<?php

namespace App\Services;

use Carbon\Carbon;

class AuthenticationService
{
    /**
     * Create user token
     *
     * @param App\Model\User $user
     * @return array
     */
    public function createUserToken($user)
    {
        $token = $user->createToken('Personal Access Token');

        return $token->plainTextToken;
    }
}