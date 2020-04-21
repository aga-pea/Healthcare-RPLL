<?php
    namespace App\Dao;
    use App\Electronics;
    use Illuminate\Support\Facades\DB;

    class ElectronicsDao
    {
        public static function createElectronic($electronic_name, $electronic_qty, $electronic_type)
        {
            Electronics::create([
                'electronic_name' => $electronic_name,
                'electronic_qty' => $electronic_qty,
                'electronic_type' => $electronic_type
            ]); 
        }
    }
?>