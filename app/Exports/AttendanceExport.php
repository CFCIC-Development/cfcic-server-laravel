<?php

namespace App\Exports;

use App\Models\Attendance;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AttendanceExport implements FromView
{
    public $attendance;

   function  __construct($attendance) {
        $this->attendance = $attendance;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.attendances', [
            'attendances' => $this->attendance,
        ]);
    }
}
