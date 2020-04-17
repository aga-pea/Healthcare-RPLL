<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Use_Case\AppointmentUseCase;
use App\Use_Case\MedicalStaffUseCase;

class RequestAppointmentController extends Controller
{

    public function index(Request $request){
        $doctor = new MedicalStaffUseCase;
        $doctor_nameid = $doctor->getWithNameId();
        return view("Patient/mail_compose",['doctor_NameId' => $doctor_nameid]);
    }
    
    public function reqAppointment(Request $request){
      
        $appoint_date = $request->input('appoint_date');
        $appoint_time = $request->input('appoint_time');
        #Viewnya nama dokter, input doctor_id
        $doctor_id = $request->input('doctor_id');
        $patient_id = $request->session()->get('patient_id');

        $newDate = date("Y-m-d", strtotime($appoint_date));

        $appointment = new AppointmentUseCase();
        $appointment->requestAppointment($newDate, $appoint_time, $patient_id, $doctor_id);
        return redirect("/patient_main");
    }

}
