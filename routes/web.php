<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegisterController;

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

// Route::get('/',);

Route::get('/login',[LoginController::class, 'index'])->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate'])->middleware('guest');

Route::get('/logout',[LoginController::class, 'logout'])->middleware('auth');

Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store'])->middleware('guest');

Route::get('/',[UserController::class, 'index']);
Route::get('/home',[UserController::class, 'index']);

Route::get('/payment/{id}',[PaymentController::class, 'index']);

Route::post('/like',[LikeController::class, 'store'])->middleware('auth');

Route::get('/wishlist',[LikeController::class, 'wishlist'])->middleware('auth');

Route::get('/friend',[LikeController::class, 'friend'])->middleware('auth');

Route::get('/store', [AvatarController::class, 'index']);

Route::get('/storeAvatar', [AvatarController::class, 'store']);
Route::post('/storeAvatar', [AvatarController::class, 'buy']);

Route::post('/topup', [AvatarController::class, 'topup']);

Route::get('/profile',[UserController::class, 'profile']);
Route::get('/edit-profile',[UserController::class, 'editProfile']);
Route::put('/edit-profile',[UserController::class, 'updateProfile']);

