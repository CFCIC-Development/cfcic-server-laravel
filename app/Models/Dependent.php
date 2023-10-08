<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    use HasFactory;
    use HasUuids;

    protected $casts = [
        'dates_attending'        => 'array',
    ];

    public function parentProfile()
    {
        return $this->belongsTo(Profile::class, 'parent_profile_id');
    }

    public function eventAttendances()
    {
        return $this->hasMany(AttendanceDependent::class, 'dependent_id');
    }
}
