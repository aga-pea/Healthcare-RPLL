<?php

    namespace App\Use_Case;
    use App\Dao\MedicalRecordDao;
    
    class MedicalDataUseCase
    {
        public static function getAllData($patient_id)
        {
            $cek_record =  new MedicalRecordDao();
            $med_record=$cek_record->getMedicalRecord($patient_id);
            return $med_record;
        }

        public static function addMedicalRecord($id_patient, $id_disease, $id_hospital, $id_visit, $anamnesia)
        {
            $addRecord = new MedicalRecordDao();
            $addRecord->createMedicalRecord($id_patient, $id_disease, $id_hospital, $id_visit, $anamnesia);
        }

    }
?>