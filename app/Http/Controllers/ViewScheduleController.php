<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Use_Case\ScheduleUseCase;
use App\Use_Case\DepartmentUseCase;
use App\Use_Case\MedicalStaffUseCase;

class ViewScheduleController extends Controller
{
    public function index(Request $request){
        $schedule = new ScheduleUseCase;
        $scheduleAll = $schedule->searchAllSchedule();
        $department =[];
        $dept= new DepartmentUseCase;
        for($i=0;$i<count($scheduleAll);$i++)
        {
            $id=$scheduleAll[$i]["department_id"];
            $dept_name=$dept->getNameWithId($id);
            $department[$dept_name]=$id;
        }
        return view("Receiptionist/view_department_schedule",['department' => $department]);
    }

    public function proses(Request $request){
        $dept = $_GET["dept"];
        $schedule = new ScheduleUseCase;
        $scheduleData = $schedule->searchScheduleByDept($dept);        
        $list_data=[];
        foreach($scheduleData as $data)
        {
            $array =[];
            $array["schedule_date"]=$data->schedule_date;
            $array["schedule_time"]=$data->schedule_time;
            $med_staff= new MedicalStaffUseCase;
            $med_staff_name = $med_staff->getNameWithId($data->medstaff_id);
            $array["med_staff"]=$med_staff_name;
            $array["total_patient"]=$data->total_patient;
            array_push($list_data,$array);
        }
        
        return view('Receiptionist/view_schedule',["schedule" => $list_data]);
    }
}
