<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Use_Case\MedicalDataUseCase;
use App\Use_Case\MedicineUseCase;
use App\Use_Case\MedicalStaffUseCase;
use App\Use_Case\DiseaseUseCase;
use App\Use_Case\HospitalUseCase;
use App\Use_Case\VisitUseCase;
use App\Use_Case\VisitCostUseCase;

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
        $medicine = new MedicineUseCase();

        $medicalrecord = $med_record->getAllDataByPatientId($patient_id);
        $recordData=[];
        $temp =1;
        $size = count($medicalrecord)-1;
        $record_id_list=[];
        foreach($medicalrecord as $data)
        {   
            $record_id = $data->record_id;
            $dataMedical=[];

            $anamnesia = $data->anamnesia;
            $dataMedical["anamnesia"] = $anamnesia;

            $id_cost = $data->cost_id;
            $cost= new VisitCostUseCase;
            $costData = $cost->searchCostById($id_cost);
            $treatment_name = $costData->treatment;
            $dataMedical["treatment"] = $treatment_name;

            $id_hospital = $data->hospital_id;
            $hospital = new HospitalUseCase;
            $hospital_name = $hospital->getNameWithId($id_hospital);
            $dataMedical["hospital"] = $hospital_name;

            $id_doctor = $costData->medstaff_id;
            $medstaff = new MedicalStaffUseCase;
            $medstaff_name = $medstaff->getNameWithId($id_doctor);
            $dataMedical["medstaff"]=$medstaff_name;
            $medicine_id = $data->medicine_id;

            if (in_array($data->record_id, $record_id_list, true) == true) {
                $array_medicine=[];
                $medicineData=$medicine->getMedicineById($medicine_id);
                $array_medicine["medicine_name"]=$medicineData->medicine_name;
                $array_medicine["medicine_qty"]=$data->qty_medicine;
                array_push($list_medicine,$array_medicine);
            }else{
                $medicineData=$medicine->getMedicineById($medicine_id);
                $list_medicine=[];
                $array_medicine=[];
                $array_medicine["medicine_name"]=$medicineData->medicine_name;
                $array_medicine["medicine_qty"]=$data->qty_medicine;
                array_push($record_id_list,$data->record_id);
                array_push($list_medicine,$array_medicine);
            }
            $dataMedical["medicine"] = $list_medicine;
            if($temp<$size)
            {
                if($data->record_id!=$medicalrecord[$temp]->record_id)
                {
                    array_push($recordData, $dataMedical);
                }
            }else{
                array_push($recordData, $dataMedical);
            }
            $temp+=1;
        }
        return view('Patient/advanced_table',['record_data'=>$recordData]);
    }

}
