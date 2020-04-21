<?php
    namespace App\Dao;
    use App\Medical_Utilities;
    use Illuminate\Support\Facades\DB;

    class MedicalUtilitiesDao
    {
        public static function createUtil($util_name, $util_qty, $util_type)
        {
            Medical_Utilities::create([
                'util_name' => $util_name,
                'util_qty' => $util_qty,
                'util_type' => $util_type
            ]); 
        }

        public static function getAllUtil(){
            $util = Medical_Utilities::paginate(10);
            return $util;
        }

        public static function deleteUtil($id)
        {
            $util = Medical_Utilities::where('util_id',$id)->first();
            $util->delete();
        }

        public static function getUtil($id)
        {
            $util = Medical_Utilities::where('util_id',$id)->first();
            return $util;
        }

        public static function updateUtil($id,$name, $qty, $type)
        {
            $util = Medical_Utilities::where('util_id',$id)->update(['util_name' => $name, 'util_qty' =>$qty, 'util_type' =>$type]);
        }
    }
?>