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
    }
?>