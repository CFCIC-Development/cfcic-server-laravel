<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\NewPasswordController;

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

require __DIR__ . '/api/v1/events.php';
require __DIR__ . '/api/v1/attendance.php';
require __DIR__ . '/api/v1/devotionals.php';

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/v1/user/{id}', [UsersController::class, 'show']);
    Route::get('/v1/profile', [UsersController::class, 'profile']);
    Route::post('/v1/auth/logout', [UsersController::class, 'logout']);
});

// user
Route::post('/v1/auth/register', [UsersController::class, 'signup']);
Route::post('/v1/auth/login', [UsersController::class, 'login']);

Route::post('/v1/auth/forgot-password', [NewPasswordController::class, 'forgotPassword']);
Route::post('/v1/auth/reset-password', [NewPasswordController::class, 'reset']);
