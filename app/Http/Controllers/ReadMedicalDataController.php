<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Use_Case\MedicalDataUseCase;

class ReadMedicalDataController extends Controller
{
    // public function index(Request $request){
    //     return view("Patient/mail_compose",['doctor' => $doctor_name]);
    // }
    public function readMedicalData(Request $request){
        $patient_id = $request->session()->get('patient_id');

        $med_record = new MedicalDataUseCase();
        // $disease_id = $med_record->getWithDisease($patient_id);
        // $medicine_id = $med_record->getWithMedicine(patient_id);
        // $hospital_id = $med_record->getWithHospital($patient_id);
        // $doctor_id = $med_record->getWithDoctor($patient_id);
        // $record_id = $med_record->getWithRecord($patient_id);
        $medicalrecord = $med_record->getAllData($patient_id);
        print($medicalrecord);
        // return view('Patient/advanced_table',['med_record'=>$med_record]);
    }

}
