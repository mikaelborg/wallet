<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//I should be able to remove these auth routes if I do them correctly using Vue?
Route::post('login', [LoginController::class, 'login']);
//Route::get('/', [HomeController::class, 'index']);
Route::get('/signin', [HomeController::class, 'index'])->name('login');;
Route::get('/register', [HomeController::class, 'index']);

//Route::get('/wallets', [HomeController::class, 'index']);
//Route::get('/login', [HomeController::class, 'index']);

Route::middleware(['auth:sanctum'])->group(function () {
    //Route::get('/wallets', [WalletController::class, 'index']);
    Route::get('/{any}', [HomeController::class, 'index'])->where('any', '.*');
});



/*
Route::get('/', function () {
    return view('dashboard');
});
*/

//Route::get('/home', [HomeController::class, 'index'])->name('home');
