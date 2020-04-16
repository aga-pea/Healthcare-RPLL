<?php

    namespace App\Use_Case;
    use App\Dao\AppointmentDao;
    
    class AppointmentUseCase
    {
        public static function requestAppointment($appoint_date, $appoint_time, $patient_id, $doctor_id)
        {
            $reqAppointment = new AppointmentDao();
            $reqAppointment->createAppointment($appoint_date, $appoint_time, $patient_id, $doctor_id);
        }

    }
?>