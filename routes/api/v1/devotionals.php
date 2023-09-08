<?php

use App\Http\Controllers\DevotionalController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
    ->middleware([
        'auth:sanctum'
    ])
    ->name('devotional.')
    ->group(function () {
        // devotional
        Route::get('/devotional/today', [DevotionalController::class, 'today']);
    });
