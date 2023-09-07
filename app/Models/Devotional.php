<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devotional extends Model
{
    use HasFactory;
    
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'devotional_category')
            ->withTimestamps();
    }

    public function usersWhoFavorited()
    {
        return $this->belongsToMany(User::class, 'user_favorite_devotionals')
            ->withTimestamps();
    }

    public function usersInHistory()
    {
        return $this->belongsToMany(User::class, 'user_history')
            ->withTimestamps();
    }
}
