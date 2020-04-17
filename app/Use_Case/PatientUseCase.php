<?php

    namespace App\Use_Case;
    use App\Dao\PatientDao;
    
    class PatientUseCase
    {
        public static function getWithUsername($username)
        {
            $cekpatient =  new PatientDao();
            $patient=$cekpatient->getPatient($username);
            if($patient)
            {
                $patient_uname = $patient->patient_uname;
                return $patient_uname;
            }
            else
            {
                return "tidak ada";
            }
            
        }

        public static function getWithPassword($username)
        {
            $cekpatient = new PatientDao();
            $patient=$cekpatient->getPatient($username);
            $patient_pwd = $patient->patient_pwd;
            return $patient_pwd;
        }

        public static function getWithName($username)
        {
            $cekpatient =  new PatientDao();
            $patient=$cekpatient->getPatient($username);
            $patient_name = $patient->patient_name;
            return $patient_name;
        }

        public static function getWithId($username)
        {
            $cekpatient =  new PatientDao();
            $patient=$cekpatient->getPatient($username);
            $patient_uname = $patient->patient_id;
            return $patient_uname;
        }
    }
?>