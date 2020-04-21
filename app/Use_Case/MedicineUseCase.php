<?php

    namespace App\Use_Case;
    use App\Dao\MedicineDao;
    
    class MedicineUseCase
    {
        
        public static function getNameWithId($id)
        {
            $cekmedicine =  new MedicineDao();
            $medicine = $cekmedicine->getMedicineWithId($id);
            $medicine_name = $medicine->medicine_name;
            return $medicine_name;
        }

        public static function addMedicine($medicine_exp_date,$medicine_level,$medicine_name, $medicine_price,$medicine_qty, $medicine_type,$medicine_vendor)
        {
            $addMedicine = new MedicineDao();
            $addMedicine->createMedicine($medicine_exp_date,$medicine_level,$medicine_name, $medicine_price,$medicine_qty, $medicine_type,$medicine_vendor);
        }
    }
?>