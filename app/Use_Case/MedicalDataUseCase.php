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

        public static function addMedicalRecord($id_patient, $id_disease, $id_hospital, $id_visit, $anamnesia)
        {
            $addRecord = new MedicalDataDao();
            $addRecord->createMedicalRecord($id_patient, $id_disease, $id_hospital, $id_visit, $anamnesia);
        }

        public static function getMedicalDataById($record_id)
        {
            $cek_record = new MedicalDataDao();
            $med_record = $cek_record->getMedicalDataById($record_id);
            return $med_record;
        }

        public static function getMedicalDataByPatient($patient_id)
        {
            $cek_record = new MedicalDataDao();
            $med_record = $cek_record->getMedicalDataByPatient($patient_id);
            return $med_record;
        }

        public static function updateMedicalDataById($record_id,$id_disease, $id_hospital, $id_visit, $anamnesia)
        {
            $med_record = new MedicalDataDao();
            $med_record->updateMedicalDataById($record_id,$id_disease, $id_hospital, $id_visit, $anamnesia);

        }

    }
?>