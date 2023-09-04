<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeCell extends Model
{
    use HasFactory;

    public function members()
    {
        return $this->hasMany(Profile::class, 'home_cell_id');
    }
}
