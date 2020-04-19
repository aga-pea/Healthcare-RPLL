<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Use_Case\MedicalDataUseCase;
use App\Use_Case\MedicineUseCase;
use App\Use_Case\MedicalStaffUseCase;
use App\Use_Case\DiseaseUseCase;
use App\Use_Case\HospitalUseCase;

class ReadMedicalDataController extends Controller
{
    // public function indexDisease(Request $request){
    //     $doctor = new MedicalStaffUseCase;
    //     $doctor_nameid = $doctor->getWithNameId();
    //     return view("Patient/mail_compose",['doctor_NameId' => $doctor_nameid]);
    // }

    // public function indexHospital(Request $request){
    //     $doctor = new MedicalStaffUseCase;
    //     $doctor_nameid = $doctor->getWithNameId();
    //     return view("Patient/mail_compose",['doctor_NameId' => $doctor_nameid]);
    // }

    public function readMedicalData(Request $request){
        $patient_id = $request->session()->get('patient_id');

        $med_record = new MedicalDataUseCase();

        $medicalrecord = $med_record->getAllData($patient_id);
        $recordData=[];

        foreach($medicalrecord as $data)
        {   
            $dataMedical=[];
            $id_medical = $data->medical_id;
            
            $id_doctor = $data->medstaff_id;
            $id_medicine = $data->medicine_id;
            $id_disease = $data->disease_id;
            $id_hospital = $data->hospital_id;

            $doctor = new MedicalStaffUseCase;
            $doctor_name = $doctor->getNameWithId($id_doctor);
            $medicine = new MedicineUseCase;
            $medicine_name = $medicine->getNameWithId($id_medicine);
            $disease = new DiseaseUseCase;
            $disease_name = $disease->getNameWithId($id_disease);
            $hospital = new HospitalUseCase;
            $hospital_name = $hospital->getNameWithid($id_hospital);

            $dataMedical["doctor"] = $doctor_name;
            $dataMedical["medicine"] = $medicine_name;
            $dataMedical["disease"] = $disease_name;
            $dataMedical["hospital"] = $hospital_name;
            array_push($recordData,$dataMedical);
        }        
        // print(var_dump($recordData[0]));
        // print("<br>");
        // print($recordData[0]["hospital"]);

        return view('Patient/advanced_table',['med_record'=>$medicalrecord, 'record_data'=>$recordData]);
    }

}
