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

        public static function getDiseaseWithId($id)
        {
            $disease = Disease::where('disease_id',$id)->first();
            return $disease;
        }

        public static function createDisease($disease_type, $disease_name)
        {
            Disease::create([
                'disease_type' => $disease_type,
                'disease_name' => $disease_name
            ]); 
        }

        public static function updateDisease($disease_id, $disease_type, $disease_name){
            $disease = Disease::where('disease_id',$disease_id)->update(['disease_type'=>$disease_type, 'disease_name'=>$disease_name]);
        }

        public static function deleteDisease($id){
            $disease = Disease::where('disease_id',$id)->first();
            $disease->delete();
        }
    }
