<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevotionalAuthor extends Model
{
    use HasFactory;

    public function devotionals()
    {
        return $this->hasMany(Devotional::class, 'id', 'devotional_author_id');
    }
}
