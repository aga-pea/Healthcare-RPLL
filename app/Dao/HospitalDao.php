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

        public static function getHospitalWithId($id)
        {
            $hospital = Hospital::where('hospital_id',$id)->first();
            return $hospital;
        }

        public static function createHospital($hospital_address, $hospital_name)
        {
            Hospital::create([
                'hospital_address' => $hospital_address,
                'hospital_name' => $hospital_name,
            ]); 
        }

        public static function updateHospital($hospital_id, $hospital_address, $hospital_name)
        {
            $hopsital = Hospital::where('hospital_id',$hospital_id)->update(['hospital_address'=>$hospital_address,'hospital_name'=>$hospital_name]);
        }

        public static function deleteHospital($id)
        {
            $hospital = Hospital::where('hospital_id',$id)->first();
            $hospital->delete();
        }

    }
?>