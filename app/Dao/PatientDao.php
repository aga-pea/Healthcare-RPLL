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

        public static function createPatient($name,$address,$age,$dob,$gender,$uname,$pwd)
        {
            Patient::create([
                'patient_name' => $name,
                'patient_address' => $address,
                'patient_age' => $age,
                'patient_dob' => $dob,
                'patient_gender' => $gender,
                'patient_uname' => $uname,
                'patient_pwd' => $pwd
            ]);
        }

        public static function getPatientAll()
        {
            $patient = Patient::paginate(10);
            return $patient;
        }
    }
?>