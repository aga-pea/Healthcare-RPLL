<?php
    namespace App\Use_Case;
    use App\Dao\DiseaseDao;

    class DiseaseUseCase
    {
        public static function getWithName($id)
        {
            $cekDisease = new DiseaseDao();
            $disease = $cekDisease->getDiseaseWithId($id);
            $disease_name = $disease->disease_name;
            return $disease_name;
        }

        public static function getWithType($id)
        {
            $cekDisease = new DiseaseDao();
            $disease = $cekDisease->getDiseaseWithId($id);
            $disease_type = $disease->disease_type;
            return $disease_type;
        }
        
        public static function getNameWithId($id)
        {
            $cekDisease =  new DiseaseDao();
            $disease = $cekDisease->getDiseaseWithId($id);
            $disease_name = $disease->disease_name;
            return $disease_name;
        }

        public static function getAllDisease()
        {
            $cekDisease =  new DiseaseDao();
            $disease = $cekDisease->getAllDisease();
            return $disease;
        }
    }
?>