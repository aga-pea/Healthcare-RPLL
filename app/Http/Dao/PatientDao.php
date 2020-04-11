<?php
    use App\NonMedical_Staff;

    class PatientDao
    {
        public static function getPatient($username)
        {
            $patient = NonMedical_Staff::where('patient_uname', $username)->first();
            return $patient;
        }
    }
?>