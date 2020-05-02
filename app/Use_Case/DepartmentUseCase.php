<?php
    namespace App\Use_Case;
    use App\Dao\DepartmentDao;

    class DepartmentUseCase
    {   
        public static function getNameWithId($id)
        {
            $cekDept =  new DepartmentDao();
            $dept = $cekDept->getDeptWithId($id);
            $dept_name = $dept->department_name;
            return $dept_name;
        }
    }
?>