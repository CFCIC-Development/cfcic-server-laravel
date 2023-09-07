<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevotionalCategory extends Model
{
    use HasFactory;

    public function devotionals()
    {
        return $this->belongsToMany(Devotional::class, 'devotional_category')
            ->withTimestamps();
    }
}
