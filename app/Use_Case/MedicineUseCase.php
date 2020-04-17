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
    }
?>