<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceEventService extends Model
{
    use HasFactory;

    public function attendance()
    {
        return $this->belongsTo(Attendance::class, 'attendance_id');
    }

    public function eventService()
    {
        return $this->belongsTo(EventService::class, 'event_service_id');
    }
}
