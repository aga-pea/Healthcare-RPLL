<?php

    namespace App\Use_Case;
    use App\Dao\NonMedicalStaffDao;
    
    class NonMedicalStaffUseCase
    {
        public static function getWithUsername($username)
        {
            $ceknonmedstaff =  new NonMedicalStaffDao();
            $nonmedstaff=$ceknonmedstaff->getNonMedicalStaff($username);
            $nonmedstaff_uname = $nonmedstaff->nonmed_uname;
            return $nonmedstaff_uname;
        }

        public static function getWithPassword($username)
        {
            $ceknonmedstaff =  new NonMedicalStaffDao();
            $nonmedstaff=$ceknonmedstaff->getNonMedicalStaff($username);
            $nonmedstaff_pwd = $nonmedstaff->nonmed_pwd;
            return $nonmedstaff_pwd;
        }

        public static function getWithName($username)
        {
            $ceknonmedstaff =  new NonMedicalStaffDao();
            $nonmedstaff=$ceknonmedstaff->getNonMedicalStaff($username);
            $nonmedstaff_name = $nonmedstaff->nonmed_name;
            return $nonmedstaff_name;
        }

        public static function getWithId($username)
        {
            $ceknonmedstaff =  new NonMedicalStaffDao();
            $nonmedstaff=$ceknonmedstaff->getNonMedicalStaff($username);
            $nonmedstaff_id = $nonmedstaff->nonmed_id;
            return $nonmedstaff_id;
        }

        public static function getWithJob($username)
        {
            $ceknonmedstaff =  new NonMedicalStaffDao();
            $nonmedstaff=$ceknonmedstaff->getNonMedicalStaff($username);
            $nonmedstaff_job = $nonmedstaff->nonmed_job;
            return $nonmedstaff_job;
        }
    }
?>