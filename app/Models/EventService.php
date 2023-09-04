<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventService extends Model
{
    use HasFactory;

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function attendances()
    {
        return $this->hasMany(AttendanceEventService::class, 'event_service_id');
    }
}
