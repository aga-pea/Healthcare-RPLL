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

        public static function searchScheduleByDate($schedule_date)
        {
            $searchSchedule = new ScheduleDao();
            $schedule = $searchSchedule->getScheduleByDate($schedule_date);
            return $schedule;
        }

        public static function searchScheduleByDateAndDept($schedule_date,$dept)
        {
            $searchSchedule = new ScheduleDao();
            $schedule = $searchSchedule->getScheduleByDateAndDept($schedule_date,$dept);
            return $schedule;
        }

        public static function searchScheduleById($schedule_id)
        {
            $searchSchedule = new ScheduleDao();
            $schedule = $searchSchedule->getScheduleById($schedule_id);
            return $schedule;
        }
    }
?>