<?php
    namespace App\Dao;
    use App\Medicine;

    class MedicineDao
    {
        public static function getMedicineWithId($id)
        {
            $medicine_nameid = Medicine::where('medicine_id',$id)->first();
            return $medicine_nameid;
        }
    }
?>