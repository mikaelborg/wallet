<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\SuperUser;

Route::post('/register', [UserController::class, 'store']);

Route::middleware(['auth:sanctum'])->group(function () {
    //only super user has access to the /users route
    Route::middleware([SuperUser::class])->group(function () {
        Route::get('/users', [UserController::class, 'index']);
    });
    Route::get('/user', [UserController::class, 'show']);
    Route::get('/wallets/{wallet}', [WalletController::class, 'show']);
    Route::get('/wallets', [WalletController::class, 'index']);
    Route::post('/wallets', [WalletController::class, 'store']);
    Route::put('/wallets/{wallet}', [WalletController::class, 'update']);
    Route::delete('/wallets/{wallet}', [WalletController::class, 'destroy']);
});


