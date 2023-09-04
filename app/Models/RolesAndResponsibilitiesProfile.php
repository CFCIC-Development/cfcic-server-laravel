<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolesAndResponsibilitiesProfile extends Model
{
    use HasFactory;

    public function roleResponsibility()
    {
        return $this->belongsTo(RolesAndResponsibilities::class, 'role_responsibility_id');
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }
}
