<?php

use App\Models\Attendance;
use App\Models\Event;
use App\Models\User;
use App\Repositories\AttendanceRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/email', function () {
    $attendee = Attendance::first();
    $event = Event::first();
    return view('emails.events.registered', compact('attendee', 'event'));
});
