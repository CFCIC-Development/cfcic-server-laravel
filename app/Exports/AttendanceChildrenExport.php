<?php

namespace App\Exports;

use App\Models\Attendance;
use App\Models\Event;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AttendanceChildrenExport implements FromView
{
    public function __construct(public Event $event)
    {
        //
    }

    public function view(): View
    {
        $attendances = $this->event->attendances()
        ->get()
        ->filter(function($attendance) {
            return !empty($attendance->children);
        });

        $result = [];
        foreach ($attendances as $attendance) {

            foreach ($attendance->children as $child) {
                $data = [];
                $data['parent_name']       = $attendance?->user?->name;
                $data['first_name']        = $child['first_name'];
                $data['last_name']         = $child['last_name'];
                $data['allergies']         = $child['allergies'];
                $data['emergency_contact'] = $child['emergency_contact'];

                $result[] = $data;
            }

        }

        return view('exports.attendanceChildren', [
            'attendances' => $result,
        ]);
    }
}
