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
    }
?>