<?php
    namespace App\Dao;
    use App\Visit;
    use Illuminate\Support\Facades\DB;

    class VisitDao
    {
        public static function getVisitById($id)
        {
            $visit = Visit::where('visit_id',$id)->first();
            return $visit;
        }
    }
?>
