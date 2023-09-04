<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChurchArm extends Model
{
    use HasFactory;

    public function partners()
    {
        return $this->hasMany(ChurchArmProfile::class, 'church_arm_id');
    }
}
