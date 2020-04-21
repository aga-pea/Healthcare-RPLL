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

        public static function createMedicine($medicine_exp_date,$medicine_level,$medicine_name, $medicine_price,$medicine_qty, $medicine_type,$medicine_vendor){
            Medicine::create([
                'medicine_exp_date' => $medicine_exp_date,
                'medicine_level' => $medicine_level,
                'medicine_name' => $medicine_name,
                'medicine_price' => $medicine_price,
                'medicine_qty' => $medicine_qty,
                'medicine_type' => $medicine_type,
                'medicine_vendor' => $medicine_vendor
            ]); 
        }
    }
?>