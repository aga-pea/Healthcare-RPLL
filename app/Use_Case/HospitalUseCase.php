<?php
    namespace App\Use_Case;
    use App\Dao\HospitalDao;

    class HospitalUseCase
    {
        public static function getWithAddress($id)
        {
            $cekHospital = new HospitalDao();
            $hospital = $cekhospital->getHospital($id);
            $hospital_address = $hospital->hospital_address;
            return $hospital_name;
        }

        public static function getWithType($id)
        {
            $cekHospital = new HospitalDao();
            $hospital = $cekhospital->getHospital($id);
            $hospital_name = $hospital->hospital_name;
            return $hospital_name;
        }

        public static function getNameWithId($id)
        {
            $cekHospital =  new HospitalDao();
            $hospital = $cekHospital->getHospitalWithId($id);
            $hospital_name = $hospital->hospital_name;
            return $hospital_name;
        }
    }
?>