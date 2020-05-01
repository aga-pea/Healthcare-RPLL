<?php

namespace App\Dao;

use App\Schedule;
use Illuminate\Support\Facades\DB;

class ScheduleDao
{
    public static function getSchedule($id)
    {
        $schedule = Schedule::where('schedule_id', $id)->first();
        return $schedule;
    }

    public static function createSchedule($schedule_date, $schedule_time, $medstaff_id)
    {
        Schedule::create([
            'schedule_date' => $schedule_date,
            'schedule_time' => $schedule_time,
            'medstaff_id' => $medstaff_id
        ]);
    }

    public static function updateSchedule($id, $date, $time)
    {
        $schedule = Schedule::where('schedule_id', $id)->update(['schedule_date' => $date, 'schedule_time' => $time]);
    }
}
