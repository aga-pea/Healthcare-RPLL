<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Use_Case\MedicalDataUseCase;
use App\Use_Case\MedicineUseCase;

class ReadMedicalDataController extends Controller
{
    // public function indexDisease(Request $request){
    //     $doctor = new MedicalStaffUseCase;
    //     $doctor_nameid = $doctor->getWithNameId();
    //     return view("Patient/mail_compose",['doctor_NameId' => $doctor_nameid]);
    // }

    public function indexMedicine(Request $request){
        $medicine = new MedicineUseCase;
        $medicine_nameid = $medicine->getWithNameId();
        return view("Patient/mail_compose",['medicine_NameId' => $medicine_nameid]);
    }

    // public function indexHospital(Request $request){
    //     $doctor = new MedicalStaffUseCase;
    //     $doctor_nameid = $doctor->getWithNameId();
    //     return view("Patient/mail_compose",['doctor_NameId' => $doctor_nameid]);
    // }

    public function indexDoctor(Request $request){
        $doctor = new MedicalStaffUseCase;
        $doctor_nameid = $doctor->getWithNameId();
        return view("Patient/mail_compose",['doctor_NameId' => $doctor_nameid]);
    }

    public function readMedicalData(Request $request){
        $patient_id = $request->session()->get('patient_id');

        $med_record = new MedicalDataUseCase();
        // $disease_id = $med_record->getWithDisease($patient_id);
        // $medicine_id = $med_record->getWithMedicine(patient_id);
        // $hospital_id = $med_record->getWithHospital($patient_id);
        // $doctor_id = $med_record->getWithDoctor($patient_id);
        // $record_id = $med_record->getWithRecord($patient_id);
        $medicalrecord = $med_record->getAllData($patient_id);
     
        return view('Patient/advanced_table',['med_record'=>$medicalrecord]);
    }

}
