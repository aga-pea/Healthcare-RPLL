<?php
    namespace App\Dao;
    use App\Medical_Staff;

    class MedicalStaffDao
    {
        public static function getMedicalStaff($username)
        {
            $medstaff = Medical_Staff::where('medstaff_uname', $username)->first();
            return $medstaff;
        }

        public static function getMedStaffNameId()
        {
            $medstaff_nameid = Medical_Staff::select('medstaff_id','medstaff_name')->get();
            return $medstaff_nameid;
        }
    }
?>