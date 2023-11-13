<?php

namespace App\Services;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\AuthRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Auth service.
 */
class AuthService
{
    private AuthRepository $authRepository;

    /**
     * Auth service constructor.
     */
    public function __construct()
    {
        $this->authRepository = new AuthRepository();
    }

    /**
     * Register a new user.
     * @param RegisterRequest $request
     * @return void
     */
    public function register(RegisterRequest $request): void
    {
        $this->authRepository->register($request);
    }

    /**
     * Login in account.
     * @param LoginRequest $credentials
     * @return JsonResponse
     */
    public function login(LoginRequest $credentials): JsonResponse
    {
        if (Auth::attempt($credentials->all())) {
            $user = Auth::user();

            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }

        return response()->json([
            'message' => 'Unauthorized',
        ]);
    }

    /**
     * Logout from account.
     * @return void
     */
    public function logout(): void
    {
        Auth::guard('web')->logout();
    }
}
