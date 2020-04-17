<?php
    namespace App\Dao;
    use App\Medical_Record;

    class MedicalRecordDao
    {
        public static function getMedicalRecord($record_patient)
        {
            $record = Medical_Record::where('patient_id', $record_patient)->get();
            return $record;
        }
    }
?>