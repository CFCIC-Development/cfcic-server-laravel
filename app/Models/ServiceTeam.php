<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTeam extends Model
{
    use HasFactory;

    public function members()
    {
        return $this->hasMany(ProfileServiceTeams::class, 'service_team_id');
    }
}
