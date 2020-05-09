<?php
    namespace App\Dao;
    use App\Appointment;
    use Illuminate\Support\Facades\DB;

    class AppointmentDao
    {
        public static function createAppointment($appoint_date, $appoint_time, $patient_id, $doctor_id, $status)
        {
            Appointment::create([
                'appt_day' => $appoint_date,
                'appt_time' => $appoint_time,
                'patient_id' => $patient_id,
                'medstaff_id' => $doctor_id,
                'appt_status' => $status
            ]); 
        }

        public static function getListPatientByStatus($status)
        {
            $appointment = Appointment::where('appt_status',$status)->paginate(10);
            return $appointment;
        }

        public static function getListPatientByAcceptedStatusDay($status, $doctor_id, $day)
        {
            $matchThese = ['appt_status' => $status, 'medstaff_id' => $doctor_id, 'appt_day' => $day];
            $appointment = Appointment::where($matchThese)->get();
            return $appointment;
        }

        public static function updateStatusById($appoint_id,$status)
        {
            $appointment = Appointment::where('appt_id',$appoint_id)->update(["appt_status" => $status]);
        }

        public static function getAppointById($appoint_id)
        {
            $appointment = Appointment::where('appt_id',$appoint_id)->first();
            return $appointment;
        }

        public static function getAppointByPatient($patient_id)
        {
            $appointment = Appointment::where('patient_id',$patient_id)->get();
            return $appointment;
        }

        public static function getAppointmentByMedStaffTimeDay($medstaff_id,$time,$day)
        {
            $matchThese = ['medstaff_id' => $medstaff_id, 'appt_day' => $day, 'appt_time' => $time];
            $appointment = Appointment::where($matchThese)->get();
            return $appointment;
        }

        public static function updateAppointmentTimeDayById($appoint_id,$time,$day)
        {
            $appointment = Appointment::where('appt_id',$appoint_id)->update(["appt_day" => $day, "appt_time" => $time]);
        }

        public static function updateStatusByDayPatientMedStaff($day,$patient_id,$medstaff_id,$status)
        {
            $matchThese = ['medstaff_id' => $medstaff_id, 'appt_day' => $day, 'patient_id' => $patient_id];
            $appointment = Appointment::where($matchThese)->update(["appt_status" => $status]);
        }
    }
?>