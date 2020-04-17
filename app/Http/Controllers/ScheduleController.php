<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Use_Case\ScheduleUseCase;

class ScheduleController extends Controller
{
    public function index(Request $request){
        return view("Doctor/doctor_schedule");
    }

    public function createSchedule(Request $request){
        $schedule_date = $request->input('schedule_date');
        $schedule_time = $request->input('schedule_time');
        $id= session()->get('doctor_id');

        $newDate = date("Y-m-d", strtotime($schedule_date));

        $appointment = new ScheduleUseCase();
        $appointment->requestSchedule($newDate, $schedule_time, $id);
        return redirect("/doctor_schedule");
    }

}
