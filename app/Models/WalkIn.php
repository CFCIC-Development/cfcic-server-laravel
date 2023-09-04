<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WalkIn extends Model
{
    use HasFactory;
    use HasUuids;

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
