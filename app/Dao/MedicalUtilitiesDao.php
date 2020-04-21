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
    }
?>