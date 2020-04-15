<?php
    namespace App\Dao;
    use App\Patient;

    class PatientDao
    {
        public static function getPatient($username)
        {
            $patient = Patient::where('patient_uname', $username)->first();
            return $patient;
        }
    }
?>