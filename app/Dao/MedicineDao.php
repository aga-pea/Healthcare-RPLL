<?php
    namespace App\Dao;
    use App\Medicine;

    class MedicineDao
    {
        public static function getMedicineStaffNameId()
        {
            $medicine_nameid = Medical_Staff::select('medstaff_id','medstaff_name')->get();
            return $medicine_nameid;
        }
    }
?>