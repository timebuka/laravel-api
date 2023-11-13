<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

/**
 * Auth controller.
 */
class AuthController extends Controller
{
    private AuthService $authService;

    /**
     * Auth controller constructor.
     */
    public function __construct()
    {
        $this->authService = new AuthService();
    }

    /**
     * Register action. Register a new user.
     * @param RegisterRequest $request
     * @return JsonResponse|void
     */
    public function register(RegisterRequest $request)
    {
        if (!($request->validated())) {
            return response()->json([
                'message' => 'Validation error',
            ]);
        }

        $this->authService->register($request);
    }

    /**
     * Login action. Login in account.
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        if (!($request->validated())) {
            return response()->json([
                'message' => 'Validation error',
            ]);
        }

        $data = $this->authService->login($request);

        return response()->json([
            'data' => $data,
        ]);
    }

    /**
     * Logout action. Logout from account.
     * @return void
     */
    public function logout(): void
    {
        $this->authService->logout();
    }
}
