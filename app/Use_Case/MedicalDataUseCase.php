<?php

    namespace App\Use_Case;
    use App\Dao\MedicalDataDao;
    
    class MedicalDataUseCase
    {
        public static function getAllData($patient_id)
        {
            $cek_record =  new MedicalDataDao();
            $med_record=$cek_record->getMedicalRecord($patient_id);
            return $med_record;
        }

        public static function addMedicalRecord($record_id,$anamnesia, $id_patient, $id_disease, $id_hospital,$qty_medicine,$medicine_id, $id_cost, $record_date)
        {
            $addRecord = new MedicalDataDao();
            $addRecord->createMedicalRecord($record_id,$anamnesia, $id_patient, $id_disease, $id_hospital,$qty_medicine,$medicine_id, $id_cost, $record_date);
        }

        public static function getMedicalDataById($record_id)
        {
            $cek_record =  new MedicalDataDao();
            $med_record=$cek_record->getMedicalDataById($record_id);
            return $med_record;
        }

        public static function getLastMedicalData()
        {
            $cek_record =  new MedicalDataDao();
            $med_record=$cek_record->getLastMedicalData();
            return $med_record;
        }
    }
?>