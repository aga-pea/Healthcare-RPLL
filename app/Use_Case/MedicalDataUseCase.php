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

    }
?>