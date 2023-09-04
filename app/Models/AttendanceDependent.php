<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceDependent extends Model
{
    use HasFactory;

    public function attendance()
    {
        return $this->belongsTo(Attendance::class, 'attendance_id');
    }

    public function dependent()
    {
        return $this->belongsTo(Dependent::class, 'dependent_id');
    }
}
