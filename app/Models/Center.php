<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;

    public function members()
    {
        return $this->hasMany(Profile::class, 'church_centre_id');
    }
}
