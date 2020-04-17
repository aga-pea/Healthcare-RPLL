<?php
    namespace App\Dao;
    use App\Medicine;

    class MedicineDao
    {
        public static function getMedicineWithId($id)
        {
            $medicine = Medicine::where('medicine_id',$id)->first();
            return $medicine;
        }
    }
?>