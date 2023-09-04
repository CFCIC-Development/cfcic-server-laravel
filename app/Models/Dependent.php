<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    use HasFactory;

    public function parentProfile()
    {
        return $this->belongsTo(Profile::class, 'parent_profile_id');
    }

    public function eventAttendances()
    {
        return $this->hasMany(AttendanceDependent::class, 'dependent_id');
    }
}
