<?php

use App\Http\Controllers\BillingController;
use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
    ->name('attendance.')
    ->group(function () {
        // attendance
        Route::get('/attendance/event/{eventId}', [AttendanceController::class, 'getAllEventAttendance']);
        Route::get('/attendance/user/{userId}', [AttendanceController::class, 'getAllUserAttendance']);
        Route::get('/attendance/{eventId}/{userId}', [AttendanceController::class, 'getUserEventAttendance']);
        Route::post('/attendance', [AttendanceController::class, 'storeAttendance']);
        Route::patch('/attendance/{id}', [AttendanceController::class, 'updateAttendance']);
    });
