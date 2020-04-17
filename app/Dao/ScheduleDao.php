<?php
    namespace App\Dao;
    use App\Schedule;
    use Illuminate\Support\Facades\DB;

    class ScheduleDao
    {
        public static function createSchedule($schedule_date, $schedule_time, $medstaff_id)
        {
            Schedule::create([
                'schedule_date' => $schedule_date,
                'schedule_time' => $schedule_time,
                'medstaff_id' => $medstaff_id
            ]);
        }
    }
?>