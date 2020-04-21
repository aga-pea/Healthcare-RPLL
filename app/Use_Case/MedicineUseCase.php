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

        public static function getListMedicine()
        {
            $medicine = new MedicineDao();
            $list_medicine=$medicine->getAllMedicine();
            return $list_medicine;
        }

        public static function getDeleteMedicine($id)
        {
            $delete = new MedicineDao();
            $delete->deleteMedicine($id);
        }

        public static function getMedicineById($id)
        {
            $medicine = new MedicineDao();
            $detail=$medicine->getMedicine($id);
            return $detail;
        }

        public static function updateMedicineData($id,$exp_date,$level,$name, $price,$qty, $type,$vendor)
        {
            $vendorMedicine = new MedicineDao();
            $vendorMedicine->updateMedicine($id,$exp_date,$level,$name, $price,$qty, $type,$vendor);
        }
    }
?>