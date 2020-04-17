<?php
    namespace App\Dao;
    use App\NonMedical_Staff;

    class NonMedicalStaffDao
    {
        public static function getNonMedicalStaff($username)
        {
            $nonmedstaff = NonMedical_Staff::where('nonmed_uname', $username)->first();
            return $nonmedstaff;
        }
    }
?>