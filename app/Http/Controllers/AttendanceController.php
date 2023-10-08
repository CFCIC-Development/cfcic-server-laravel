<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Http\Resources\AttendanceResource;
use App\Models\Attendance;
use App\Repositories\AttendanceRepository;

class AttendanceController extends Controller
{

    public function getAllEventAttendance(string $eventId)
    {
        $attendance = Attendance::where('event_id', $eventId)->get();

        return AttendanceResource::collection($attendance);
    }

    public function getAllUserAttendance(string $userId)
    {
        $attendance = Attendance::where('user_id', $userId)->get();

        return AttendanceResource::collection($attendance);
    }

    public function getUserEventAttendance(string $eventId, string $userId)
    {
        $attendance = Attendance::where([
            'event_id' => $eventId,
            'user_id' => $userId,
        ])->first();

        return new AttendanceResource($attendance);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeAttendance(StoreAttendanceRequest $request, AttendanceRepository $repository)
    {
        $payload = $request->only([
            'event_id',
            'user_id',
            'in_person',
            'requires_accommodation',
            'requires_feeding',
            'requires_transport',
            'services_required',
            'dates_attending',
            'existing_dependents',
            'new_dependents',
        ]);

        $created = $repository->create($payload);

        return response()->json($created);

        return new AttendanceResource($created);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateAttendance(UpdateAttendanceRequest $request, Attendance $attendance, AttendanceRepository $repository)
    {
        //
    }
}
