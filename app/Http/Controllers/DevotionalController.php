<?php

namespace App\Http\Controllers;

use App\Http\Resources\DevotionalResource;
use App\Models\Devotional;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DevotionalController extends Controller
{
    public function today()
    {
        $todaysDevotional = Devotional::whereDate('date', Carbon::today())->first();

        if (!$todaysDevotional) {
            return response()->json([
                'status' => 404,
                'data' => null
            ]);
        }

        return new DevotionalResource($todaysDevotional);
    }
}
