<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Use_Case\PatientUseCase;
use App\Use_Case\MedicalDataUseCase;
use App\Use_Case\VisitCostUseCase;
use App\Use_Case\DiseaseUseCase;
use App\Use_Case\HospitalUseCase;

class UpdateMedicalDataController extends Controller
{
    public function getListpatient()
    {
     
        $med_record = new MedicalDataUseCase();
        $list_med_record = $med_record->getAllData();

        $list_patient_nameid = [];
        $list_patient_id=[];
        foreach ($list_med_record as $data) {
            $array = [];

            $patient = new PatientUseCase();
            $patientData = $patient->getPatientById($data->patient_id);

            if (in_array($patientData->patient_id, $list_patient_id, true) != true) {
                $array["patient_id"] = $patientData->patient_id;
                $array["patient_name"] = $patientData->patient_name;
                array_push($list_patient_nameid, $array);
                array_push($list_patient_id, $array["patient_id"]);
            }
        }

        return view('Doctor/update_medical_data_main',['list_patient_nameid' => $list_patient_nameid]);
    }

    public function getListMedicalRecord()
    {
        $patient_id = $_GET["patient"];
        $med_record = new MedicalDataUseCase();
        $med_record_data = $med_record->getAllDataByPatientId($patient_id);
        
        return view('Doctor/update_medical_data_list',['med_record_data' => $med_record_data]);
    }

    public function viewMedRecordDetail(Request $request)
    {
        $record_id = $_GET['record_id'];

        $med_record = new MedicalDataUseCase();
        $med_record_data = $med_record->getMedicalDataById($record_id);
        $anamnesia = $med_record_data[0]->anamnesia;

        $disease = new DiseaseUseCase();
        $disease_list = $disease->getAllDisease();

        $hospital = new HospitalUseCase();
        $hospital_list = $hospital->getAllHospital();

        $medstaff_id = $request->session()->get('doctor_id');

        $cost = new VisitCostUseCase();
        $cost_list = $cost->searchCostByMedStaff($medstaff_id);

        return view('Doctor/update_medical_data_view_record', ['anamnesia' => $anamnesia, 'record_id' => $record_id, 'disease_list' => $disease_list, 
                                                                'hospital_list' => $hospital_list, 'cost_list' => $cost_list]);
    }



    public function updateMedRecord(Request $request)
    {
        $this->validate($request, [
            'anamnesia' => 'required'
        ]);

        $anamnesia = $_GET['anamnesia'];
        $id_disease = $_GET['disease'];
        $id_hospital = $_GET['hospital'];
        $id_cost = $_GET['cost'];
        $record_id = $_GET['record_id'];

        $med_record = new MedicalDataUseCase();
        $med_record->updateMedicalDataById($record_id, $id_disease, $id_hospital, $id_cost, $anamnesia);

        return redirect('/doctor_medical_data_list_patient')->with("alert","Medical Record Sukses Diupdate");
    }
    
}
