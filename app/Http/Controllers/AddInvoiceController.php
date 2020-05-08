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
        $list_patient = [];
        $patient_id = [];

        foreach ($invoiceData as $data) {
            $array = [];
            $patient = new PatientUseCase();
            $patientData = $patient->getPatientById($data->patient_id);

            if (in_array($patientData->patient_id, $patient_id, true) != true) {
                $array["patient_id"] = $patientData->patient_id;
                $array["patient_name"] = $patientData->patient_name;

                array_push($list_patient, $array);
                array_push($patient_id, $array["patient_id"]);
            }
        }
        $invoice = new InvoiceUseCase();
        $invoiceAll = $invoice->searchInvoiceByStatus("Paid");
        $invoicelist=[];
        foreach($invoiceAll as $data)
        {
            $array = [];
            $array["date"]=$data->invoice_date;
            $array["amount"]=$data->invoice_amount;
            $array["method"]=$data->invoice_method;
            $patient = new PatientUseCase();
            $patientData = $patient->getPatientById($data->patient_id);
            $array["patient_name"]=$patientData->patient_name;

            array_push($invoicelist, $array);
        }
        return view('Cashier/invoice_main',["list_patient" => $list_patient, "invoice_list" => $invoicelist]);
    }

    public function proses(Request $request)
    {
        $id = $_GET["patient"];
        $invoice = new InvoiceUseCase();
        $invoiceAll = $invoice->searchInvoiceByPatientStatus($id,"Active");
        return view('Cashier/invoice_list');
    }
}
