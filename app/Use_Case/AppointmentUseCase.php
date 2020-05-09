<?php

namespace App\Use_Case;

use App\Dao\AppointmentDao;

class AppointmentUseCase
{
    public static function requestAppointment($appoint_date, $appoint_time, $patient_id, $doctor_id, $status)
    {
        $reqAppointment = new AppointmentDao();
        $reqAppointment->createAppointment($appoint_date, $appoint_time, $patient_id, $doctor_id, $status);
    }

    public static function searchListPatientByStatus($status)
    {
        $appointment = new AppointmentDao();
        $listAppointment = $appointment->getListPatientByStatus($status);
        return $listAppointment;
    }

    public static function searchListPatientByAcceptedStatusDay($status, $doctor_id, $day)
    {
        $appointment = new AppointmentDao();
        $listAppointment = $appointment->getListPatientByAcceptedStatusDay($status, $doctor_id,$day);
        return $listAppointment;
    }

    public static function updateAppointment($appoint_id, $status)
    {
        $appointment = new AppointmentDao();
        $appointment->updateStatusById($appoint_id, $status);
    }

    public static function getAppointmentById($appoint_id)
    {
        $appointment = new AppointmentDao();
        $appointmentData = $appointment->getAppointById($appoint_id);
        return $appointmentData;
    }

    public static function getAppointmentByPatient($patient_id)
    {
        $appointment = new AppointmentDao();
        $appointmentData = $appointment->getAppointByPatient($patient_id);
        return $appointmentData;
    }

    public static function getAppointmentByMedStaffTimeDay($medstaff_id, $time, $day)
    {
        $appointment = new AppointmentDao();
        $appointmentData = $appointment->getAppointmentByMedStaffTimeDay($medstaff_id, $time, $day);
        return $appointmentData;
    }

    public static function updateAppointmentTimeDayById($id, $time, $day)
    {
        $appointment = new AppointmentDao();
        $appointmentData = $appointment->updateAppointmentTimeDayById($id, $time, $day);
    }

    public static function updateStatusByDayPatientMedStaff($day,$patient_id,$doctor_id,$status)
    {
        $appointment = new AppointmentDao();
        $appointment->updateStatusByDayPatientMedStaff($day,$patient_id,$doctor_id,$status);
    }
}
