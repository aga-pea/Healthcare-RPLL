<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Use_Case\ScheduleUseCase;
use App\Use_Case\MedicalStaffUseCase;

class ScheduleController extends Controller
{
    public function index(Request $request){
        return view("Doctor/doctor_schedule");
    }

    public function createSchedule(Request $request){
        $schedule_date = $request->input('schedule_day');
        $schedule_time = $request->input('schedule_time');
        $total_patient = $request->input('total_patient');
        $id= session()->get('doctor_id');
        
        $medstaff = new MedicalStaffUseCase;
        $medstaffData = $medstaff->getMedStaffWithId($id);
        $department_id = $medstaffData->department_id;

        $appointment = new ScheduleUseCase();
        $appointment->requestSchedule($schedule_date, $schedule_time, $id,$total_patient,$department_id);
        return redirect("/doctor_schedule");
    }

    public function updateSchedule(Request $request){
        $id = $_GET['schedule_id'];
        $date = $_GET['schedule_day'];
        $time = $_GET['schedule_time'];
        $total_patient = $_GET['total_patient'];

        $schedule = new ScheduleUseCase();
        $schedule->updateSchedule($id, $date, $time,$total_patient);
        return view("Doctor/doctor_schedule");
    }

}
