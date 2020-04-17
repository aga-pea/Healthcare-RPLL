<?php

    namespace App\Use_Case;
    use App\Dao\MedicalStaffDao;
    
    class MedicalStaffUseCase
    {
        public static function getWithUsername($username)
        {
            $cekmedstaff =  new MedicalStaffDao();
            $medstaff=$cekmedstaff->getMedicalStaff($username);
            if($medstaff)
            {
                $medstaff_uname = $medstaff->medstaff_uname;
                return $medstaff_uname;
            }
            else
            {
                return "tidak ada";
            }
            
        }

        public static function getWithPassword($username)
        {
            $cekmedstaff = new MedicalStaffDao();
            $medstaff=$cekmedstaff->getMedicalStaff($username);
            $medstaff_pwd = $medstaff->medstaff_pwd;
            return $medstaff_pwd;
        }

        public static function getWithName($username)
        {
            $cekmedstaff =  new MedicalStaffDao();
            $medstaff=$cekmedstaff->getMedicalStaff($username);
            $medstaff_uname = $medstaff->medstaff_name;
            return $medstaff_uname;
        }

        public static function getWithId($username)
        {
            $cekmedstaff =  new MedicalStaffDao();
            $medstaff=$cekmedstaff->getMedicalStaff($username);
            $medstaff_id = $medstaff->medstaff_id;
            return $medstaff_id;
        }
        
        public static function getWithNameId()
        {
            $cekmedstaff =  new MedicalStaffDao();
            $medstaff_nameid = $cekmedstaff->getMedStaffNameId();
            return $medstaff_nameid;
        }
    }
?>