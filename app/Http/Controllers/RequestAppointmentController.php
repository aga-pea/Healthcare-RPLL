<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestAppointmentController extends Controller
{

    public function ReqAppointment(Request $request){
        $appoint_date = $request->input('appoint_date');
        $appoint_time = $request->input('appoint_time');
        #Viewnya nama dokter, input doctor_id
        $doctor_id = $request->input('doctor_id');
        
        Appointment::create([
            'appt_date' => $appoint_date
            'appt_time' => $appoint_time
            'patient_id' => $request->session()->get('patient_id')
            'medstaff_id' => $doctor_id
        ]); 
     
    }

}
