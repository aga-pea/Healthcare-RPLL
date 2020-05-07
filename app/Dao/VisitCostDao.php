<?php
    namespace App\Dao;
    use App\Visit_Cost;
    use Illuminate\Support\Facades\DB;

    class VisitCostDao
    {
        public static function createVisitCost($treatment, $price, $medstaff_id)
        {
            Visit_Cost::create([
                'treatment' => $treatment,
                'price' => $price,
                'medstaff_id' => $medstaff_id,
            ]);
        }

        public static function getVisitCostAll()
        {
            $cost = Visit_Cost::paginate(10);
            return $cost;
        }

        public static function getVisitCostById($id)
        {
            $cost = Visit_Cost::where('cost_id', $id)->first();
            return $cost;
        }

        public static function getCostByMedStaff($medstaff_id)
        {
            $cost = Visit_Cost::where('medstaff_id', $medstaff_id)->get();
            return $cost;
        }

        public static function getCostByMedStaffTreatmentPrice($medstaff_id,$treatment,$price)
        {
            $matchThese = ['medstaff_id' => $medstaff_id, 'treatment' => $treatment, 'price' => $price];
            $cost = Visit_Cost::where($matchThese)->first();
            return $cost;
        }
    }
?>