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
            $array["total_patient"]=$schedule_data->total_patient;
            // $array["total_patient"]=$schedule_data->schedule_id;
            array_push($list_data,$array);
        }
        return view('Receiptionist/handle_appointment_main',["appointment" => $list_data]);
    }

    public function change_status(Request $request)
    {
        $id = $_GET["id"];
        return view('Receiptionist/handle_appointment_set',['id' => $id]);
    }

    public function change_status_proses(Request $request)
    {
        $id = $_GET["id"];
        $choice = $_GET["choice"];
        if($choice=="Rejected")
        {
            $reason = $_GET["reason"];
            $pilihan =$choice." ,".$reason;
            $appointment = new AppointmentUseCase;
            $appointment->updateAppointment($id,$pilihan);
            return redirect("/receiptionist_main")->with('alert', 'Appointment Berhasil Diupdate');
        }
        else if($choice=="Accepted")
        {
            $appointment = new AppointmentUseCase;
            $appointData = $appointment->getAppointmentById($id);
            $date=$appointData->appt_date;
            $time=$appointData->appt_time;
            $medstaff=$appointData->medstaff_id;
            $schedule = new ScheduleUseCase;
            $scheduleData= $schedule->searchScheduleByMedStaffDateTime($medstaff,$date,$time);
            if($scheduleData->total_patient>0){
                $appointment->updateAppointment($id,$choice);
                $schedule->addTotalPatientByScheduleId($scheduleData->schedule_id,$scheduleData->total_patient-1);
                return redirect("/receiptionist_main")->with('alert', 'Appointment Berhasil Diupdate');
            }else{
                redirect()->back()->with('alert','Patient sudah penuh');
            }
        }
        else
        {
            return redirect()->back()->with('alert','Anda belum memasukkan pilihan');
        }
    }

}
