<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Use_Case\MedicalDataUseCase;
use App\Use_Case\AppointmentUseCase;
use App\Use_Case\PatientUseCase;

class AddMedicalRecordController extends Controller
{

    public function addMedicalRecord(Request $request)
    {
        //Get patient_id yang appointment statusnya Accepted
        $doctor_id = $request->session()->get('doctor_id');
        $status = 'Accepted';
        $appointment = new AppointmentUseCase();
        $appointmentData = $appointment->searchListPatientByAcceptedStatus($status, $doctor_id);

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

        print(var_dump($list_patient_id) . "<br>");
        print(var_dump($list_patient_name));

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
}
