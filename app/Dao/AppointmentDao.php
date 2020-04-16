<?php
    namespace App\Dao;
    use App\Appointment;
    use Illuminate\Support\Facades\DB;
    
    class AppointmentDao
    {
        public static function createAppointment($appoint_date, $appoint_time, $patient_id, $doctor_id)
        {
            $appoint_time = "09:10:09";

            Appointment::create([
                'appt_date' => $appoint_date,
                'appt_time' => $appoint_time,
                'patient_id' => $patient_id,
                'medstaff_id' => $doctor_id
            ]); 
        }
    }
?>