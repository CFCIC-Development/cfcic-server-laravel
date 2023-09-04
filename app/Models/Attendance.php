<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function servicesRequired()
    {
        return $this->hasMany(AttendanceEventService::class, 'attendance_id');
    }

    public function children()
    {
        return $this->hasMany(AttendanceDependent::class, 'attendance_id');
    }
}
