<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Use_Case\InvoiceUseCase;
use App\Use_Case\PatientUseCase;
class AddInvoiceController extends Controller
{
    public function index()
    {
        $invoice = new InvoiceUseCase();
        $invoiceData = $invoice->searchInvoiceByStatus("Active");
        $list_patient= [];
        $patient_name=[];
        foreach($invoiceData as $data)
        {
            $array=[];
            $patient = new PatientUseCase();
            $patientData = $patient->getPatientById($data->patient_id);
            if (in_array($patientData->patient_name, $patient_name, true) != true)
            {
                print("halo");
                $array["patient_id"]=$patientData->patient_id;
                $array["patient_name"]=$patientData->patient_name;
                array_push($list_patient,$array);
                array_push($patient_name, $array["patient_name"]);
            }
            
        }
        print(var_dump($patient_name)."<br>");
        print(var_dump($list_patient));
        // return view('Cashier/invoice');
    }
}
