<?php
    namespace App\Dao;
    use App\Department;

    class DepartmentDao
    {
        public static function getDeptWithId($id)
        {
            $dept = Department::where('department_id',$id)->first();
            return $dept;
        }
    }
    
?>