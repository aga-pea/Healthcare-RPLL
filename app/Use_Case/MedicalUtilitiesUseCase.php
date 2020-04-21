<?php

    namespace App\Use_Case;
    use App\Dao\MedicalUtilitiesDao;
    
    class MedicalUtilitiesUseCase
    {
        public static function addUtil($util_name, $util_qty, $util_type)
        {
            $addUtil = new MedicalUtilitiesDao();
            $addUtil->createUtil($util_name, $util_qty, $util_type);
        }

        public static function getListUtil()
        {
            $util = new MedicalUtilitiesDao();
            $list_util = $util->getAllUtil();
            return $list_util;
        }

        public static function getDeleteUtil($id)
        {
            $delete = new MedicalUtilitiesDao();
            $delete->deleteUtil($id);
        }

        public static function getUtilById($id)
        {
            $util = new MedicalUtilitiesDao();
            $detail=$util->getUtil($id);
            return $detail;
        }

        public static function updateUtilData($id,$name,$qty,$type)
        {
            $updateUtil = new MedicalUtilitiesDao();
            $updateUtil->updateUtil($id,$name, $qty, $type);
        }
    }
?>