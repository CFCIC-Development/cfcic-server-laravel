<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChurchArmProfile extends Model
{
    use HasFactory;

    public function churchArm()
    {
        return $this->belongsTo(ChurchArm::class, 'church_arm_id');
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }
}
