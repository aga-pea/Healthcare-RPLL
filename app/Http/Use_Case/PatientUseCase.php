<?php

    namespace App\Http\Use_Case;
    include("Dao\PatientDao.php");
    
    class PatientUseCase
    {
        public static function getWithUsername($username)
        {
            $cekpatient =  new PatientDao();
            $patient=$cekpatient->getPatient($username);
            $patient_uname = $patient->patient_uname;
            return $patient_uname;
        }

        public static function getWithPassword($username)
        {
            $cekpatient = new PatientDao();
            $patient=$cekpatient->getPatient($username);
            $patient_pwd = $patient->patient_pwd;
            return $patient_pwd;
        }
    }
?>