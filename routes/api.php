<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users/{user}', [UserController::class, 'show']); //probably extra
Route::get('/users', [UserController::class, 'index']); //should only be accessed by new super user middleware

//should require auth middleware to access
Route::get('/wallets/{wallet}', [WalletController::class, 'show']);
Route::get('/wallets', [WalletController::class, 'index']);
Route::post('/wallets/', [WalletController::class, 'create']);
Route::put('/wallets/{wallet}', [WalletController::class, 'update']);
Route::delete('/wallets/{wallet}', [WalletController::class, 'destroy']);

