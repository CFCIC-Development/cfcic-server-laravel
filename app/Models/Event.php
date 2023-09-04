<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    use HasUuids;

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'event_id');
    }

    public function walkIns()
    {
        return $this->hasMany(WalkIn::class, 'event_id');
    }

    public function eventServices()
    {
        return $this->hasMany(EventService::class, 'event_id');
    }
}
