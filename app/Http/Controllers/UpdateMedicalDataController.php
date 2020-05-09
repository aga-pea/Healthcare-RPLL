<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Use_Case\PatientUseCase;
use App\Use_Case\MedicalDataUseCase;

class UpdateMedicalDataController extends Controller
{
    public function index()
    {
        $patient = new PatientUseCase();
        $list_patient = $patient->getListPatient();
        
        $list_patient_nameid = [];
        foreach ($list_patient as $data) {
            $array = [];
            $array["patient_id"] = $data->patient_id;
            $array["patient_name"] = $data->patient_name;
            array_push($list_patient_nameid, $array);
        }

        //get pertama untuk get medical record patient yang mana
        $id_patient = $_GET['patient_id'];
        $med_record = new MedicalDataUseCase();
        $list_med_record = $med_record->getMedicalDataByPatient($id_patient);
        //list_med_record untuk doctor memilih record_id yang diupdate pada view
        
        //..... the code

        // return view("Doctor/index",['medical_record' => $list_data]);
        $id_record = $_GET['disease_id'];


        //get kedua untuk value yang diupdate berdasarkan record_id yang telah dipilih
        $id_disease = $_GET['disease_id'];
        $id_hospital = $_GET['hospital_id'];
        $id_visit = $_GET['visit_id'];
        $anamnesia = $_GET['anamnesia'];
        
        $med_record->updateMedicalDataById($id_record, $id_disease, $id_hospital, $id_visit, $anamnesia);
        
        // return view('Doctor/index', ["patient_list" => $list_patient_nameid]);
    }
    
}
