<?php
    namespace App\Dao;
    use App\Electronics;
    use Illuminate\Support\Facades\DB;

    class ElectronicsDao
    {
        public static function getAllElectronic()
        {
            $electronic = Electronics::paginate(10);
            return $electronic;
        }

        public static function getElectronic($id)
        {
            $electronic = Electronics::where('electronic_id',$id)->first();
            return $electronic;
        }

        public static function createElectronic($electronic_name, $electronic_qty, $electronic_type)
        {
            Electronics::create([
                'electronic_name' => $electronic_name,
                'electronic_qty' => $electronic_qty,
                'electronic_type' => $electronic_type
            ]); 
        }

        public static function updateElectronic($id, $name, $qty, $type)
        {
            $electronic = Electronics::where('electronic_id',$id)->update(['electronic_name'=>$name,'electronic_qty'=>$qty,'electronic_type'=>$type]);
        }

        public static function deleteElectronics($id)
        {
            $electronic = Electronics::where('electronic_id',$id)->first();
            $electronic->delete();
        }
    }
?>