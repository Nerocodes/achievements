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
        $tokenObject = $user->createToken('Personal Access Token');
        $token = $tokenObject->token;
        $token->expires_at = Carbon::now()->addDay();
        $token->save();

        return [
            'access_token' => $tokenObject->accessToken,
            'type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $token->expires_at
            )->toDateTimeString()
        ];
    }
}