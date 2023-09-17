<?php

namespace App\Filament\Widgets;

use App\Models\Attendance;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {

        return [
            Stat::make('Faith Adventure 2023', Attendance::count())
                ->description('Total registered')
                ->color('success'),
            Stat::make('Require Feeding', Attendance::where('requires_feeding', 1)->count())
                ->description('Total')
                ->color('warning'),
            Stat::make('Require Accommodation', Attendance::where('requires_accommodation', 1)->count())
                ->color('warning')
                ->description('Total'),
            Stat::make('Require Transport', Attendance::where('requires_transport', 1)->count())
                ->color('warning')
                ->description('Total'),
            Stat::make('Confirmed/Onsite Attendance', Attendance::where('checked_in', 1)->count() . '/' . Attendance::where('in_person', 1)->count())
                ->color('warning')
                ->description('Total')
        ];
    }
}
