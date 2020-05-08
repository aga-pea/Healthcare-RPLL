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
        $patient_id=[];
        foreach($invoiceData as $data)
        {
            $array=[];
            $patient = new PatientUseCase();
            $patientData = $patient->getPatientById($data->patient_id);
            if (in_array($patientData->patient_id, $patient_id, true) != true)
            {
                $array["patient_id"]=$patientData->patient_id;
                $array["patient_name"]=$patientData->patient_name;
                array_push($list_patient,$array);
                array_push($patient_id, $array["patient_id"]);
            }
            
        }
        print(var_dump($patient_id)."<br>");
        print(var_dump($list_patient));
        // return view('Cashier/invoice_main');
    }
}
