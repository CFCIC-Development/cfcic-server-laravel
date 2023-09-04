<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileServiceTeams extends Model
{
    use HasFactory;

    public function serviceTeam()
    {
        return $this->belongsTo(ServiceTeam::class, 'service_team_id');
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }
}
