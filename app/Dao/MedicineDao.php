<?php
    namespace App\Dao;
    use App\Medicine;

    class MedicineDao
    {
        public static function getMedicineWithId($id)
        {
            $medicine = Medicine::where('medicine_id',$id)->first();
            return $medicine;
        }

        public static function createMedicine($medicine_exp_date,$medicine_level,$medicine_name, $medicine_price,$medicine_qty, $medicine_type,$medicine_vendor){
            Medicine::create([
                'medicine_exp_date' => $medicine_exp_date,
                'medicine_level' => $medicine_level,
                'medicine_name' => $medicine_name,
                'medicine_price' => $medicine_price,
                'medicine_qty' => $medicine_qty,
                'medicine_type' => $medicine_type,
                'medicine_vendor' => $medicine_vendor
            ]); 
        }

        public static function getAllMedicine(){
            $medicine = Medicine::paginate(10);
            return $medicine;
        }

        public static function deleteMedicine($id)
        {
            $medicine = Medicine::where('medicine_id',$id)->first();
            $medicine->delete();
        }

        public static function getMedicine($id)
        {
            $medicine = Medicine::where('medicine_id',$id)->first();
            return $medicine;
        }

        public static function updateMedicine($id,$exp_date,$level,$name, $price,$qty, $type,$vendor)
        {
            $medicine = Medicine::where('medicine_id',$id)->update(['medicine_exp_date'=>$exp_date,'medicine_level'=>$level,'medicine_name'=>$name,'medicine_price'=>$price,'medicine_qty'=>$qty,'medicine_type'=>$type,'medicine_vendor'=>$vendor]);
        }

        public static function getAllMedicineData()
        {
            $medicine = Medicine::get();
            return $medicine;
        }

        public static function updateMedicineQtyById($medicine_id, $selisih)
        {
            $medicine = Medicine::where('medicine_id',$medicine_id)->update(['medicine_qty'=>$selisih]);
        }
    }
?>