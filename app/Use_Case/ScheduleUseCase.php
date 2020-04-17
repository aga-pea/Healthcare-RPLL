<?php

    namespace App\Use_Case;
    use App\Dao\ScheduleDao;

    class ScheduleUseCase
    {
        public static function requestSchedule($schedule_date, $schedule_time, $id)
        {
            $reqSchedule = new ScheduleDao();
            $reqSchedule->createSchedule($schedule_date, $schedule_time, $id);
        }

    }
?>