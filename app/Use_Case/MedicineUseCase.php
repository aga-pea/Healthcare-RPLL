<?php

    namespace App\Use_Case;
    use App\Dao\MedicineDao;
    
    class MedicineUseCase
    {
        
        public static function getWithNameId($id)
        {
            $cekmedicine =  new MedicineDao();
            $medicine_name = $cekmedicine->getMedicineWithId($id);
            return $medicine_name;
        }
    }
?>