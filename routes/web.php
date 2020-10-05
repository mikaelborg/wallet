<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\SuperUser;


Route::post('login', [LoginController::class, 'login']);
Route::get('/signin', [HomeController::class, 'index'])->name('login');
Route::get('/register', [HomeController::class, 'index']);

Route::middleware(['auth:sanctum'])->group(function () {
    //only super user has access to the /users route
    Route::middleware([SuperUser::class])->group(function () {
        Route::get('/users', [HomeController::class, 'index']);
    });
    Route::get('/wallets', [HomeController::class, 'index'])->name('wallets');
});

Route::get('/', [HomeController::class, 'index']);
