<?php

    namespace App\Use_Case;
    use App\Dao\ScheduleDao;

    class ScheduleUseCase
    {
        public static function requestSchedule($schedule_date, $schedule_time, $id,$total_patient,$department_id)
        {
            $reqSchedule = new ScheduleDao();
            $reqSchedule->createSchedule($schedule_date, $schedule_time, $id,$total_patient,$department_id);
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

        public static function updateSchedule($id, $date, $time, $total_patient)
        {
            $updateSchedule = new ScheduleDao();
            $updateSchedule->updateSchedule($id,$date, $time,$total_patient);
        }

        public static function searchScheduleByDateAndMedStaff($tgl,$med_staff)
        {
            $searchSchedule = new ScheduleDao();
            $schedule = $searchSchedule->getScheduleByDateAndMedStaff($tgl,$med_staff);
            return $schedule;
        }

        public static function addTotalPatientByScheduleId($id,$total_patient)
        {
            $addSchedule = new ScheduleDao();
            $schedule = $addSchedule->updateTotalPatientById($id,$total_patient);
        }

        public static function searchScheduleByMedStaffDateTime($medstaff_id,$appt_date,$appt_time)
        {
            $schedule = new ScheduleDao();
            $data= $schedule->getScheduleByMedStaffDateTime($medstaff_id,$appt_date,$appt_time);
            return $data;
        }

        public static function searchAllSchedule()
        {
            $schedule = new ScheduleDao();
            $scheduleData = $schedule->getAllSchedule();
            return $scheduleData;
        }

        public static function searchScheduleByDept($id_dept)
        {
            $schedule = new ScheduleDao();
            $scheduleData = $schedule->getScheduleByDept($id_dept);
            return $scheduleData;
        }
    }
?>