<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Use_Case\PatientUseCase;
use App\Use_Case\ScheduleUseCase;
use App\Use_Case\DepartmentUseCase;
use App\Use_Case\MedicalStaffUseCase;
use App\Use_Case\AppointmentUseCase;

class PatientRegistrationController extends Controller
{
    public function detail(Request $request){
        if($request->submit == "submit")
        {
            $tipe = $_GET['tipe'];
            session()->put('tipe',$tipe);
            if($tipe=="Patient")
            {
                return view('Receiptionist/input_new_patient');
            }
            else
            {
                $patient = new PatientUseCase;
                $patientAll = $patient->getListPatient();
                return view('Receiptionist/input_new_appointment',["patientAll" => $patientAll]);
            }
        }else{
            $tipe = session()->get('tipe');
            $patient = new PatientUseCase;
            $patientAll = $patient->getListPatient();
            return view('Receiptionist/input_new_appointment',["patientAll" => $patientAll]);
        }
        
    }

    public function appointment_pick(Request $request){
        $id = $_GET["id"];
        session()->put('id_patient',$id);
        $request->session()->forget('tipe');  
    }

    public function proses_patient(Request $request){
        $this->validate($request,[
            'patient_name' => 'required',
            'patient_address' => 'required',
            'patient_age' => 'required|numeric',
            'patient_dob' => 'required',
            'patient_gender' => 'required|alpha',
            'patient_uname' => 'required',
            'patient_pwd' => 'required'
        ]);
        $name = $_GET['patient_name'];
        $address = $_GET['patient_address'];
        $age = $_GET['patient_age'];
        $dob = $_GET['patient_dob'];
        $gender = $_GET['patient_gender'];
        $uname = $_GET['patient_uname'];
        $pwd = $_GET['patient_pwd'];
        $patient = new PatientUseCase;

        $uname_cek=$patient->getWithUsername($uname);
        if($uname_cek!="tidak ada")
        {
            return redirect()->back()->with('alert', 'Username sudah terdaftar pilih username lain');
        }
        else
        {   
            $patient_add = $patient->addPatient($name,$address,$age,$dob,$gender,$uname,$pwd);
            $id=$patient->getWithId($uname);
            $request->session()->put('id_patient',$id);
            return redirect("/receiptionist_patient_register_appointment"); 
        }
    }

    public function patient_appointment(Request $request){
        $tgl_format=date('Y-m-d');
        $tgl=date('d-m-Y');
        $schedule = new ScheduleUseCase;
        $scheduleAll = $schedule->searchScheduleByDate($tgl_format);
        $department =[];
        $dept= new DepartmentUseCase;
        for($i=0;$i<count($scheduleAll);$i++)
        {
            $id=$scheduleAll[$i]["department_id"];
            $dept_name=$dept->getNameWithId($id);
            $department[$dept_name]=$id;
        }
        return view("Receiptionist/input_new_patient_appointment",['tgl' => $tgl, 'department' => $department, 'tgl_format' => $tgl_format]);
    }

    public function patient_appointment_detail(Request $request)
    {
        $tgl = $_GET['tgl'];
        $dept= $_GET['dept'];
        $tgl_format=date('Y-m-d');
        $tgl=date('d-m-Y');
        $schedule = new ScheduleUseCase;
        $scheduleAll = $schedule->searchScheduleByDateAndDept($tgl_format,$dept);
        $med_staff = new MedicalStaffUseCase;
        $medStaff=[];
        for($i=0;$i<count($scheduleAll);$i++)
        {
            $id=$scheduleAll[$i]["medstaff_id"];
            $med_staff_name=$med_staff->getNameWithId($id);
            $medStaff[$med_staff_name]=$id;
        }
        
        return view("Receiptionist/input_new_patient_appointment_full",['schedule' => $scheduleAll, 'med_staff' => $medStaff, 'tgl_format' => $tgl_format]);
    }

    public function patient_appointment_proses(Request $request)
    {
        $patient_id = $request->session()->get('id_patient');
        $med_staff= $_GET['med_staff'];
        $time_schedule = $_GET['time_schedule'];
        $tgl = $_GET['tgl'];
        $appt_status="Accepted";

        $schedule = new ScheduleUseCase;
        $scheduleData = $schedule->searchScheduleById($time_schedule);
        $appt = new AppointmentUseCase();
        $appt->requestAppointment($tgl, $scheduleData->schedule_time, $patient_id, $med_staff, $appt_status);

        $request->session()->forget('id_patient');
        $request->session()->forget('tipe');  
        return redirect("/receiptionist_main");
    }
}
