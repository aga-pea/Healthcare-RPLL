<?php

namespace App\Http\Controllers;
use App\Use_Case\AppointmentUseCase;
use App\Use_Case\ScheduleUseCase;
use App\Use_Case\MedicalStaffUseCase;
use Illuminate\Http\Request;

class HandleAppointmentController extends Controller
{
    public function display_appointment(){
        $appointment = new AppointmentUseCase;
        $appointmentAll = $appointment->searchListPatientByStatus("Active");
        $list_data=[];
        foreach($appointmentAll as $data){
            $array=[];
            $array["appt_id"]=$data->appt_id;
            $array["appt_date"]=$data->appt_date;
            $array["appt_time"]=$data->appt_time;
            $med_staff= new MedicalStaffUseCase;
            $med_staff_name = $med_staff->getNameWithId($data->medstaff_id);
            $array["medStaff_name"]=$med_staff_name;
            $schedule = new ScheduleUseCase;
            $schedule_data = $schedule->searchScheduleByMedStaffDateTime($data->medstaff_id,$array["appt_date"],$array["appt_time"]);
            $array["total_patient"]=$schedule_data->schedule_id;
            // $array["total_patient"]=$schedule_data->schedule_id;
            array_push($list_data,$array);
        }
        return view('Receiptionist/handle_appointment_main',["appointment" => $list_data]);
    }

    public function change_status(Request $request)
    {
        $id = $_GET["id"];
        print($id);

        return view('Receiptionist/',[]);
    }

}
