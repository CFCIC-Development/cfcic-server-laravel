<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function dependents()
    {
        return $this->hasMany(Dependent::class, 'parent_profile_id');
    }

    public function churchCentre()
    {
        return $this->belongsTo(ChurchCentre::class, 'church_centre_id');
    }

    public function homeCell()
    {
        return $this->belongsTo(HomeCell::class, 'home_cell_id');
    }

    public function colony()
    {
        return $this->belongsTo(Colony::class, 'colony_id');
    }

    public function serviceTeams()
    {
        return $this->hasMany(ProfileServiceTeams::class, 'profile_id');
    }

    public function rolesAndResponsibilities()
    {
        return $this->hasMany(RolesAndResponsibilitiesProfile::class, 'profile_id');
    }

    public function partneredArms()
    {
        return $this->hasMany(ChurchArmProfile::class, 'profile_id');
    }
}
