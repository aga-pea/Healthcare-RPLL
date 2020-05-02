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

        public static function getScheduleByDate($schedule_date)
        {
            $shcedule = Schedule::where('schedule_date',$schedule_date)->get();
            return $shcedule;
        }

        public static function getScheduleByDateAndDept($schedule_date,$dept)
        {
            $schedule = Schedule::where('schedule_date',$schedule_date)->where('department_id',$dept)->get();
            return $schedule;
        }

        public static function getScheduleById($schedule_id)
        {
            $schedule = Schedule::Where('schedule_id',$schedule_id)->first();
            return $schedule;
        }

        public static function updateSchedule($id, $date, $time)
        {
            $schedule = Schedule::where('schedule_id', $id)->update(['schedule_date' => $date, 'schedule_time' => $time]);
        }   
    }
?>