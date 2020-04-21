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

        public static function getListElectronics()
        {
            $electronic = new ElectronicsDao();
            $list_elec=$electronic->getAllElectronic();
            return $list_elec;
        }

        public static function getDeleteElectronics($id)
        {
            $delete = new ElectronicsDao();
            $delete->deleteElectronics($id);
        }

        public static function getElectronicsById($id)
        {
            $electronic = new ElectronicsDao();
            $detail=$electronic->getElectronic($id);
            return $detail;
        }

        public static function updateElectronicData($id,$name,$qty,$type)
        {
            $updateElec = new ElectronicsDao();
            $updateElec->updateElectronic($id, $name, $qty, $type);
        }
    }
?>