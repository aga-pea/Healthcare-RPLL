<?php
    namespace App\Dao;
    use App\Medical_Record;

    class MedicalDataDao
    {
        public static function getMedicalRecord($record_patient)
        {
            $record = Medical_Record::where('patient_id', $record_patient)->get();
            return $record;
        }

        public static function createMedicalRecord($record_id,$anamnesia, $id_patient, $id_disease, $id_hospital,$qty_medicine,$medicine_id, $id_cost, $record_date){
            Medical_Record::create([
                'record_id' => $record_id,
                'anamnesia' => $anamnesia,
                'patient_id' => $id_patient,
                'disease_id' => $id_disease,
                'hospital_id' => $id_hospital,
                'qty_medicine' => $qty_medicine,
                'medicine_id' => $medicine_id,
                'cost_id' => $id_cost,
                'record_date'=>$record_date
            ]); 
        }

        public static function getMedicalDataById($record_id)
        {
            $record = Medical_Record::where('record_id',$record_id)->get();
            return $record;
        }

        public static function getLastMedicalData()
        {
            $med_data =  Medical_Record::latest('record_id')->first();
            return $med_data;
        }
    }
?>