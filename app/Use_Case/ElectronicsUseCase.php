<?php

    namespace App\Use_Case;
    use App\Dao\ElectronicsDao;
    
    class ElectronicsUseCase
    {
        public static function addElectronic($electronic_name, $electronic_qty, $electronic_type)
        {
            $addElec = new ElectronicsDao();
            $addElec->createElectronic($electronic_name, $electronic_qty, $electronic_type);
        }

    }
?>