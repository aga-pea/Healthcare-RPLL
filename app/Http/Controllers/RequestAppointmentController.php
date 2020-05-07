<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Use_Case\AppointmentUseCase;
use App\Use_Case\MedicalStaffUseCase;
use App\Use_Case\DepartmentUseCase;
use App\Use_Case\ScheduleUseCase;

class RequestAppointmentController extends Controller
{

    public function index(Request $request){
        $doctor = new MedicalStaffUseCase;
        $doctor_nameid = $doctor->getWithNameId();
        $appointment= new AppointmentUseCase;
        $patient_id = $request->session()->get('patient_id');
        $appointment_data = $appointment->getAppointmentByPatient($patient_id);
        $list_appointment=[];

        foreach($appointment_data as $data){
            $array = [];
            $medstaff_name = $doctor->getNameWithId($data->medstaff_id);
            $array["medstaff_name"]=$medstaff_name;
            $array["appt_time"]=$data->appt_time;
            $array["appt_date"]=$data->appt_day;
            $status = $data->appt_status;
            if($status=="Accepted")
            {
                $array["appt_status"]="Accepted";
                $array["appt_reason"]="";
            }
            else if($status=="Active")
            {
                $array["appt_status"]="Active";
                $array["appt_reason"]="Waiting for response...";
            }
            else
            {
                $status_str = substr($status, 0, strpos($status, " , "));
                $array["appt_status"]=$status_str;
                $reason = substr($status, strpos($status, " , ")+3, strlen($status));
                $array["appt_reason"]=$reason;
            }
            array_push($list_appointment,$array);
        }

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

        return view("Patient/appointment_view",['department' => $department, 'appointment' => $list_appointment]);
    }

    public function pickAppointment(Request $request){
        $dept = $_GET["department"];
        $schedule = new ScheduleUseCase;
        $scheduleData = $schedule->searchScheduleByDept($dept);        
        $list_data=[];
        foreach($scheduleData as $data)
        {
            $array =[];
            $array["schedule_date"]=$data->schedule_day;
            $array["schedule_time"]=$data->schedule_time;
            $med_staff= new MedicalStaffUseCase;
            $med_staff_name = $med_staff->getNameWithId($data->medstaff_id);
            $array["med_staff"]=$med_staff_name;
            $array["med_staff_id"]=$data->medstaff_id;
            $array["total_patient"]=$data->total_patient;
            array_push($list_data,$array);
        }

        return view("Patient/appointment_pick",['schedule' => $list_data]);
    }
    
    public function reqAppointment(Request $request){
        $appoint_date = $request->input('appoint_date');
        $appoint_time = $request->input('appoint_time');
        
        #Viewnya nama dokter, input doctor_id
        $medstaff = $request->input('medstaff');
        

        $patient_id = $request->session()->get('patient_id');
        $status = "Active";
        $appointment = new AppointmentUseCase();
        $appointment->requestAppointment($appoint_date, $appoint_time, $patient_id, $medstaff, $status);
        return redirect("/patient_main")->with("alert","Appointment Berhasil dikirim");
    }

}
