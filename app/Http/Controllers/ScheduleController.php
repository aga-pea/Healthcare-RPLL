<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Use_Case\ScheduleUseCase;
use App\Use_Case\MedicalStaffUseCase;
use App\Use_Case\AppointmentUseCase;

class ScheduleController extends Controller
{
    public function index(Request $request){
        $id= session()->get('doctor_id');
        $schedule = new ScheduleUseCase;
        $schedule_data = $schedule->searchScheduleByMedstaff($id);
        return view("Doctor/add_schedule",['schedule' => $schedule_data]);
    }

    public function createSchedule(Request $request){
        $this->validate($request,[
            'schedule_time' => 'required',
            'total_patient' => 'required|numeric'
        ]);
        $schedule_day = $request->input('schedule_day');
        $schedule_time = $request->input('schedule_time');
        $total_patient = $request->input('total_patient');
        $total_patient_left = $total_patient;
        $medstaff_id= session()->get('doctor_id');
        
        $schedule = new ScheduleUseCase();
        $scheduleData=$schedule->searchScheduleByMedStaffDateTime($medstaff_id,$schedule_day,$schedule_time);

       if($scheduleData==null)
       {
            $medstaff = new MedicalStaffUseCase;
            $medstaffData = $medstaff->getMedStaffWithId($medstaff_id);
            $department_id = $medstaffData->department_id;

            $schedule->requestSchedule($schedule_day, $schedule_time, $medstaff_id,$total_patient,$total_patient_left,$department_id);
            return redirect("/doctor_schedule")->with('alert','Schedule berhasil ditambahkan');
       }
       else
       {
        return redirect("/doctor_schedule")->with('alert','Schedule sudah ada!');
       }
    }
    
    public function updateSchedule(Request $request){
        $id = $_GET['schedule_id'];
        $day_input = $_GET['schedule_day'];
        $tgl_format = date('N');
        $time = $_GET['schedule_time'];
        $total_patient = $_GET['total_patient'];
        $schedule = new ScheduleUseCase;
        $detail = $schedule->searchScheduleById($id);

        if($tgl_format==1)
        {
            $day ="Monday";
        }
        else if($tgl_format==2)
        {
            $day = "Tuesday";
        }
        else if($tgl_format==3)
        {
            $day = "Wednesday";
        }
        else if($tgl_format==4)
        {
            $day = "Thursday";
        }
        else if($tgl_format==5)
        {
            $day = "Friday";
        }
        else if($tgl_format==6)
        {
            $day = "Saturday";
        }
        else if($tgl_format==7)
        {
            $day = "Sunday";
        }

        if($day==$detail->schedule_day)
        {
            return redirect()->back()->with('alert','Schedule Tidak Dapat Diupdate Pada Hari ini !!');
        }
        else
        {
            if($detail->total_patient<$total_patient)
            {
                $selisih = $total_patient - $detail->total_patient;
                $appointment = new AppointmentUseCase();
                $appointmentList = $appointment->getAppointmentByMedStaffTimeDay($detail->medstaff_id,$detail->schedule_time,$detail->schedule_day);
                
                foreach($appointmentList as $data)
                {
                    
                    if($data->appt_status=="Accepted" || $data->appt_status=="Active")
                    {
                        $appointment->updateAppointmentTimeDayById($data->appt_id,$time,$day_input);
                    }
                }
                $schedule->updateSchedule($id, $day_input, $time,$total_patient, $detail->total_patient_left+$selisih);
                
                return redirect("/doctor_schedule_update")->with('alert','Schedule berhasil diupdate');
            }
            else if($detail->total_patient>$total_patient)
            {
                $total_patient_new = $detail->total_patient - $total_patient;
                $selisih = $detail->total_patient_left - $total_patient_new;
                
                if($selisih>=0)
                {
                    $appointment = new AppointmentUseCase();
                    $appointmentList = $appointment->getAppointmentByMedStaffTimeDay($detail->medstaff_id,$detail->schedule_time,$detail->schedule_day);
                    
                    foreach($appointmentList as $data)
                    {
                        
                        if($data->appt_status=="Accepted" || $data->appt_status=="Active")
                        {
                            $appointment->updateAppointmentTimeDayById($data->appt_id,$time,$day_input);
                        }
                    }

                    $schedule->updateSchedule($id, $day_input, $time,$total_patient, $selisih);
                    return redirect("/doctor_schedule_update")->with('alert','Schedule berhasil diupdate');
                }
                else{
                    return redirect("/doctor_schedule_update")->with('alert','Jumlah baru patient lebih rendah dari yang sudah mendaftar');
                }
                
            }else{
                return redirect("/doctor_schedule_update")->with('alert','Schedule berhasil diupdate');
            }
        }
    }

    public function view_schedule(Request $request)
    {
        $id= session()->get('doctor_id');
        $schedule = new ScheduleUseCase;
        $schedule_data = $schedule->searchScheduleByMedstaff($id);
        return view("Doctor/doctor_schedule_update",["schedule" => $schedule_data]);
    }

    public function view_schedule_detail(Request $request)
    {
        $id = $_GET['id'];
        if ($request->submit == "edit") 
        {
            $schedule = new ScheduleUseCase;
            $detail = $schedule->searchScheduleById($id);
            return view('Doctor/doctor_schedule_update_detail', ['detail' => $detail]);
        }
    }

}
