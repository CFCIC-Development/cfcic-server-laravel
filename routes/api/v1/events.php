<?php

use App\Http\Controllers\BillingController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
    ->middleware([
        'auth:sanctum'
    ])
    ->name('event.')
    ->group(function () {
        // Events
        Route::get('/event', [EventController::class, 'index']);
        Route::post('/event', [EventController::class, 'store']);
        Route::get('/event/{eventId}', [EventController::class, 'show']);
        Route::patch('/event/{eventId}', [EventController::class, 'update']);
        Route::delete('/event/{eventId}', [EventController::class, 'destroy']);
    });
