<?php

namespace App\Repositories;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Auth repository.
 */
class AuthRepository
{
    /**
     * Register a new user.
     * @param RegisterRequest $request
     * @return void
     */
    public function register(RegisterRequest $request): void
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }
}
