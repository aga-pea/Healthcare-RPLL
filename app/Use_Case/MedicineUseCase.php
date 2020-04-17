<?php

    namespace App\Use_Case;
    use App\Dao\MedicineDao;
    
    class MedicineUseCase
    {
        
        public static function getWithNameId()
        {
            $cekmedicine =  new MedicineDao();
            $medicine_nameid = $cekmedicine->getMedicineStaffNameId();
            return $medicine_nameid;
        }
    }
?>