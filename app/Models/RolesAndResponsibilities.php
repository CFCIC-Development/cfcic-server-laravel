<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolesAndResponsibilities extends Model
{
    use HasFactory;

    public function members()
    {
        return $this->hasMany(RolesAndResponsibilitiesProfile::class, 'role_responsibility_id');
    }
}
