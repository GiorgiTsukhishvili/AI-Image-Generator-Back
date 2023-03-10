<?php

use App\Http\Controllers\OpenAiImageController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

Route::controller(OpenAiImageController::class)->group(function () {
    Route::post('/ai-image', 'store')->name('ai-images.store');
});

Route::controller(UserController::class)->group(function () {
    Route::post('/user', 'store')->name('user.store');
});

Route::controller(UserAuthController::class)->group(function () {
    Route::post('/login', 'login')->name('user-auth.login');
    Route::get('/logout', 'logout')->name('user-auth.logout');
});
