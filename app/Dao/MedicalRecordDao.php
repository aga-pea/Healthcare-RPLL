<?php
    namespace App\Dao;
    use App\Medical_Record;

    class MedicalRecord
    {
        public static function getMedicalRecord($record_patient)
        {
            $record = Medical_Record::where('patient_id', $record_patient)->first();
            return $record;
        }
    }
?>