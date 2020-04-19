<?php
    namespace App\Dao;
    use App\Hospital;

    class HospitalDao
    {
        public static function getHospital($id)
        {
            $record = Hospital::where('hospital_id', $id)->get();
            return $record;
        }

        public static function updateHospital($column,$value)
        {

        }

        public static function createHospital($hospital_address,$hospital_name){

        }

        public static function deleteHospital($id){
            
        }

        public static function getHospitalWithId($id)
        {
            $hospital = Hospital::where('hospital_id',$id)->first();
            return $hospital;
        }
    }
?>