<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\AuthenticationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class AuthenticationController extends Controller
{
    private $userRepository, $authenticationService;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepository, AuthenticationService $authenticationService)
    {
        $this->userRepository = $userRepository;
        $this->authenticationService = $authenticationService;
    }

    /**
     * Register new user
     * 
     * @param RegisterRequest $request
     * 
     * @return Response
     */
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = $this->userRepository->create($data);
        $token = $this->authenticationService->createUserToken($user);

        $responseData = [
            'user' => $user,
            'token' => $token
        ];

        return Response::send(true, 201, 'User created successfully', $responseData);
    }

    /**
     * Login user
     * 
     * @param LoginRequest $request
     * 
     * @return Response
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if(!Auth::attempt($credentials)) {
            return Response::send(false, 401, 'Invalid credentials');
         }

         $user = $request->user();
         
         $token = $this->authenticationService->createUserToken($user);

         $data = [
            'user' => $user,
            'token' => $token
         ];

        return Response::send(true, 200, 'Login successful', $data);
    }
}
