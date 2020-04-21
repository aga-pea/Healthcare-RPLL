<?php

    namespace App\Use_Case;
    use App\Dao\MedicalUtilitiesDao;
    
    class MedicalUtilitiesUseCase
    {
        public static function addUtil($util_name, $util_qty, $util_type)
        {
            $addUtil = new MedicalUtilitiesDao();
            $addUtil->createUtil($util_name, $util_qty, $util_type);
        }

    }
?>