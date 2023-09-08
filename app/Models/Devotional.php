<?php

namespace App\Models;

use App\Models\DevotionalAuthor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Devotional extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(DevotionalAuthor::class, 'devotional_author_id', 'id');
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
