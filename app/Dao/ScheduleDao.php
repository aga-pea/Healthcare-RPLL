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
        
        public static function createSchedule($schedule_day, $schedule_time, $medstaff_id,$total_patient,$total_patient_left,$department_id)
        {
            Schedule::create([
                'schedule_day' => $schedule_day,
                'schedule_time' => $schedule_time,
                'medstaff_id' => $medstaff_id,
                'total_patient' => $total_patient,
                'total_patient_left' => $total_patient_left,
                'department_id' => $department_id
            ]);
        }

        public static function getScheduleByDate($schedule_date)
        {
            $shcedule = Schedule::where('schedule_day',$schedule_date)->get();
            return $shcedule;
        }

        public static function getScheduleByDateAndDept($schedule_date,$dept)
        {
            $schedule = Schedule::where('schedule_day',$schedule_date)->where('department_id',$dept)->get();
            return $schedule;
        }

        public static function getScheduleById($schedule_id)
        {
            $schedule = Schedule::Where('schedule_id',$schedule_id)->first();
            return $schedule;
        }

        public static function updateSchedule($id, $date, $time,$total_patient,$total_patient_left)
        {
            $schedule = Schedule::where('schedule_id', $id)->update(['schedule_day' => $date, 'schedule_time' => $time, 'total_patient' => $total_patient, 'total_patient_left' => $total_patient_left]);
        }

        public static function getScheduleByDateAndMedStaff($tgl,$med_staff)
        {
            $schedule = Schedule::where('schedule_day',$tgl)->where('medstaff_id',$med_staff)->get();
            return $schedule;
        }

        public static function updateTotalPatientLeftById($id,$total_patient_left)
        {
            $schedule = Schedule::where('schedule_id', $id)->update(['total_patient_left' => $total_patient_left]);
        }

        public static function getScheduleByMedStaffDateTime($medstaff_id,$appt_date,$appt_time)
        {
            $matchThese = ['medstaff_id' => $medstaff_id, 'schedule_day' => $appt_date, 'schedule_time' => $appt_time];
            $schedule = Schedule::where($matchThese)->first();
            return $schedule;
        }

        public static function getAllSchedule()
        {
            $schedule = Schedule::get();
            return $schedule;
        }

        public static function getScheduleByDept($id_dept)
        {
            $schedule = Schedule::where('department_id',$id_dept)->get();
            return $schedule;
        }

        public static function getScheduleByMedstaff($id_medstaff)
        {
            $schedule = Schedule::where('medstaff_id',$id_medstaff)->get();
            return $schedule;
        }
    }
?>