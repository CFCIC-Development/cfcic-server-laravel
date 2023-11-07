<?php

use App\Models\User;
use App\Models\Event;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Exports\AttendanceChildrenExport;
use App\Repositories\AttendanceRepository;

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
    $attendance = Attendance::first();
    $event = Event::first();
    return view('emails.events.registered', compact('attendance', 'event'));
});

Route::get('/export/children', function () {
    $event = Event::first();
    return Excel::download(new AttendanceChildrenExport($event), 'childrenAttendance.xlsx');
});
