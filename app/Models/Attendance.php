<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $casts = [
        'dates_attending'        => 'array',
        'children'               => 'array',
        'services_required'      => 'array',
        'in_person'              => 'boolean',
        'requires_feeding'       => 'boolean',
        'requires_accommodation' => 'boolean',
        'requires_transport'     => 'boolean',
        'checked_in'             => 'boolean',
        'checked_in'             => 'boolean',
    ];

    protected $dates = ['registration_date'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class)->whereNotNull('name')->withDefault([
            'name' => 'No name',
        ]);
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
