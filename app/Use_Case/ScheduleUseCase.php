<?php

    namespace App\Use_Case;
    use App\Dao\ScheduleDao;

    class ScheduleUseCase
    {
        public static function requestSchedule($schedule_day, $schedule_time, $medstaff_id,$total_patient,$total_patient_left,$department_id)
        {
            $reqSchedule = new ScheduleDao();
            $reqSchedule->createSchedule($schedule_day, $schedule_time, $medstaff_id,$total_patient,$total_patient_left, $department_id);
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

        public static function updateSchedule($id, $date, $time, $total_patient,$total_patient_left)
        {
            $updateSchedule = new ScheduleDao();
            $updateSchedule->updateSchedule($id,$date, $time,$total_patient,$total_patient_left);
        }

        public static function searchScheduleByDateAndMedStaff($tgl,$med_staff)
        {
            $searchSchedule = new ScheduleDao();
            $schedule = $searchSchedule->getScheduleByDateAndMedStaff($tgl,$med_staff);
            return $schedule;
        }

        public static function addTotalPatientLeftByScheduleId($id,$total_patient_left)
        {
            $addSchedule = new ScheduleDao();
            $schedule = $addSchedule->updateTotalPatientLeftById($id,$total_patient_left);
        }

        public static function searchScheduleByMedStaffDateTime($medstaff_id,$schedule_day,$schedule_time)
        {
            $schedule = new ScheduleDao();
            $data= $schedule->getScheduleByMedStaffDateTime($medstaff_id,$schedule_day,$schedule_time);
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

        public static function searchScheduleByMedstaff($id_medstaff)
        {
            $schedule = new ScheduleDao();
            $scheduleData = $schedule->getScheduleByMedstaff($id_medstaff);
            return $scheduleData;
        }
    }
