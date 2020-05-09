<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use App\Use_Case\MedicalDataUseCase;
use App\Use_Case\AppointmentUseCase;
use App\Use_Case\PatientUseCase;
use App\Use_Case\DiseaseUseCase;
use App\Use_Case\HospitalUseCase;
use App\Use_Case\InvoiceUseCase;
use App\Use_Case\VisitCostUseCase;
use App\Use_Case\MedicineUseCase;
use Session;

class AddMedicalDataController extends Controller
{

    public function addMedicalRecord(Request $request)
    {
        //Get patient_id yang appointment statusnya Accepted
        $doctor_id = $request->session()->get('doctor_id');
        $status = 'Accepted';
        $appointment = new AppointmentUseCase();
        $tgl_format = date('N');
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

        $appointmentData = $appointment->searchListPatientByAcceptedStatusDay($status, $doctor_id,$day);

        $list_patient_name = [];
        $list_patient_id=[];
        foreach ($appointmentData as $data) {
            $array = [];
            $patient = new PatientUseCase();
            $patientData = $patient->getPatientById($data->patient_id);
            if (in_array($patientData->patient_id, $list_patient_id, true) != true) {
                $array["patient_id"] = $patientData->patient_id;
                $array["patient_name"] = $patientData->patient_name;
                array_push($list_patient_name, $array);
                array_push($list_patient_id, $array["patient_id"]);
            }
        }

        return view('Doctor/add_medical_data_main',['list_patient_name' => $list_patient_name]);
        //Anamnesia required
        // $this->validate($request, [
        //     'anamnesia' => 'required'
        // ]);

        //get
        // $id_patient = $_GET['patient_id'];
        // $id_disease = $_GET['disease_id'];
        // $id_hospital = $_GET['hospital_id'];
        // $id_visit = $_GET['visit_id'];
        // $anamnesia = $_GET['anamnesia'];
                        
        //create
        // $med_record = new MedicalDataUseCase();
        // $add_med_record = $med_record->addMedicalRecord($id_patient, $id_disease, $id_hospital, $id_visit, $anamnesia);

        // return redirect('/doctor_main')->with('alert', 'Medical Record Berhasil Ditambahkan');
    }

    public function detail_index(Request $request)
    {
        $patient_id = $_GET["patient"];
        $patient = new PatientUseCase();
        $patientData = $patient->getPatientById($patient_id);
        $patient_name = $patientData->patient_name;

        $disease = new DiseaseUseCase();
        $disease_list = $disease->getAllDisease();

        $hospital = new HospitalUseCase();
        $hospital_list = $hospital->getAllHospital();

        $medstaff_id = $request->session()->get('doctor_id');

        $cost = new VisitCostUseCase();
        $cost_list = $cost->searchCostByMedStaff($medstaff_id);

        $request->session()->put('patient_id',$patient_id);
        return view('Doctor/add_medical_data_detail', ['patient_name' =>$patient_name, 'disease_list' => $disease_list, 'hospital_list' => $hospital_list, 'cost_list' => $cost_list]);
    }

    public function detail_medicine(Request $request)
    {
        $this->validate($request, [
            'anamnesia' => 'required'
        ]);
        $anamnesia = $_GET['anamnesia'];
        $id_disease = $_GET['disease'];
        $id_hospital = $_GET['hospital'];
        $id_cost = $_GET['cost'];
        $request->session()->put('anamnesia',$anamnesia);
        $request->session()->put('disease',$id_disease);
        $request->session()->put('hospital',$id_hospital);
        $request->session()->put('cost',$id_cost);
        
        $medicine = new MedicineUseCase();
        $medicine_list = $medicine->getAllMedicine();

        return view('Doctor/add_medical_data_medicine',["medicine_list" => $medicine_list]);
    }

    public function detail_medicine_list(Request $request)
    {
        if($_GET["tipe"]=="add"){
            $this->validate($request, [
                'medicine_qty' => 'required|numeric'
            ]);
            $medicine_list_data = session()->get('medicine_list',[]);
            $array = [];
            $array["medicine_id"]=$_GET["medicine_id"];
            $array["medicine_qty"] = $_GET["medicine_qty"];
            $medicine = new MedicineUseCase();
            $medicine_list = $medicine->getMedicineById($array["medicine_id"]);
            if($medicine_list->medicine_qty>0){
                $selisih =$medicine_list->medicine_qty - $array["medicine_qty"];
                if($selisih>=0){
                    $array["medicine_name"] = $medicine_list->medicine_name;
                    $array["medicine_tipe"] = $medicine_list->medicine_type;
                    $array["medicine_level"]=$medicine_list->medicine_level;

                    $medicine->updateMedicineQtyById($array["medicine_id"], $selisih);
                    

                    $medicine = new MedicineUseCase();
                    $medicine_list = $medicine->getAllMedicine();

                    $cek=false;
                    if($medicine_list_data)
                    {
                        foreach($medicine_list_data as &$data)
                        {   
                            if(strcmp($data["medicine_name"],$array["medicine_name"])==0)
                            {   
                                $hasil=(int)$data["medicine_qty"];
                                $hasil+=$array["medicine_qty"];
                                $data["medicine_qty"]=$hasil;
                                $cek=true;
                                break;
                            }
                        }
                        if($cek){
                            Session::put('medicine_list',$medicine_list_data);
                            
                        }else{
                            Session::push('medicine_list',$array);
                        }
                    }
                    else
                    {
                        Session::push('medicine_list',$array);
                    }
                    $medicine_list_data = session()->get('medicine_list',[]);
                    return view('Doctor/add_medical_data_medicine_list',['medicine_list'=>$medicine_list,'medicine_data' => $medicine_list_data])->with("alert","obat berhasil ditambahkan");
                }else{
                    $medicine = new MedicineUseCase();
                    $medicine_list = $medicine->getAllMedicine();
                    $medicine_list_data = session()->get('medicine_list',[]);
                    return view('Doctor/add_medical_data_medicine_list',['medicine_list'=>$medicine_list,'medicine_data' => $medicine_list_data])->with("alert", "Jumlah obat kurang");
                }
            }
        }
    }

    public function detail_medicine_list_cancel(Request $request)
    {
        if($_GET["tipe"]=="delete"){
            $pos =$_GET["posisi"];
            $event_data_display = session()->get('medicine_list');
            session()->forget('medicine_list');
            array_splice($event_data_display,$pos,1);
            $count=count($event_data_display);
            if($count>0){
                session()->put('medicine_list', $event_data_display);
            }

            $medicine = new MedicineUseCase();
            $medicine_list = $medicine->getAllMedicine();
            $medicine_list_data = session()->get('medicine_list',[]);
            
            return view('Doctor/add_medical_data_medicine_list',['medicine_list'=>$medicine_list,'medicine_data' => $medicine_list_data])->with('alert',"Obat Berhasil dihapus");
        }
    }

    public function detail_proses(Request $request)
    {
        $list_medicine = session()->get('medicine_list');
        $patient_id = session()->get('patient_id');
        $anamnesia = session()->get('anamnesia');
        $disease_id = session()->get('disease');
        $hospital_id = session()->get('hospital');
        $cost_id = session()->get('cost');
        $doctor_id = $request->session()->get('doctor_id');

        $tgl_format = date('N');

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

        $appointment = new AppointmentUseCase;
        $appointment->updateStatusByDayPatientMedStaff($day,$patient_id,$doctor_id,"Finished");

        $medical_record = new MedicalDataUseCase;
        $medical_record_cek = $medical_record->getLastMedicalData();
        $record_date = date("Y-m-d");
        if($medical_record_cek)
        {
            $index = $medical_record_cek->record_id;
            $index_now=$index+1;
            foreach($list_medicine as $data)
            {
                $qty_medicine = $data["medicine_qty"];
                $medicine_id = $data["medicine_id"];
                $medical_record->addMedicalRecord($index_now,$anamnesia, $patient_id, $disease_id, $hospital_id,$qty_medicine,$medicine_id, $cost_id, $record_date);
            }

            $invoice = new InvoiceUseCase;
            $invoice->addInvoice(0, $record_date,"none","Active",$patient_id,$index_now);
        }
        else
        {
            $index_now=1;
            foreach($list_medicine as $data)
            {
                $qty_medicine = $data["medicine_qty"];
                $medicine_id = $data["medicine_id"];
                $medical_record->addMedicalRecord($index_now,$anamnesia, $patient_id, $disease_id, $hospital_id,$qty_medicine,$medicine_id, $cost_id, $record_date);
            }

            $invoice = new InvoiceUseCase;
            $invoice->addInvoice(0, $record_date,"none","Active",$patient_id,$index_now);
        }

        return redirect('/doctor_medical_record')->with("alert","Medical Record Sukses Dijalankan");
    }
}