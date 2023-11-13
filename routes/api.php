<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/** Auth routes. */
Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register')->name('auth.register');
    Route::post('/login', 'login')->name('auth.login');
    Route::post('/logout', 'logout')->middleware('auth:sanctum')->name('auth.logout');
});

/** API resource routes. */
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResources([
        'posts' => PostController::class,
        'comments' => CommentController::class,
    ]);
});
