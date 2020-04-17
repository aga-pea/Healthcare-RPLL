<?php
    namespace App\Dao;
    use App\Disease;

    class DiseaseDao
    {
        public static function getAllDisease($id)
        {
            $record = Disease::where('disease_id', $id)->get();
            return $record;
        }

        public static function updateDisease($column,$value)
        {

        }

        public static function createDisease($disease_type,$disease_name){

        }

        public static function deleteDisease($id){

        }
    }
?>