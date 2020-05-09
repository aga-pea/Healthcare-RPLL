<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Use_Case\InvoiceUseCase;
use App\Use_Case\PatientUseCase;
use App\Use_Case\MedicalDataUseCase;
use App\Use_Case\MedicalStaffUseCase;
use App\Use_Case\VisitCostUseCase;
use App\Use_Case\MedicineUseCase;

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
        
        $patient = new PatientUseCase();
        $patientData = $patient->getPatientById($id);
        $patient_name=$patientData->patient_name;

        $invoicelist=[];
        foreach($invoiceAll as $data)
        {
            $array = [];
            $array["invoice_id"]=$data->invoice_id;

            $record = new MedicalDataUseCase();
            $recordList = $record->getMedicalDataById($data->record_id);
            $recordData = $recordList[0];
            $array["record_date"]=$recordData->record_date;
            
            $cost_id = $recordData->cost_id;
            $cost = new VisitCostUseCase;
            $costData = $cost->searchCostById($cost_id);
            
            $med_staff_id = $costData->medstaff_id;
            $med_staff = new MedicalStaffUseCase;
            $med_staff_data = $med_staff->getMedStaffWithId($med_staff_id);
            $array["med_staff_name"] =$med_staff_data->medstaff_name;

            array_push($invoicelist, $array);
        }
        return view('Cashier/invoice_list',['patient_name' => $patient_name, 'record' => $invoicelist]);
    }

    public function detail(Request $request)
    {
        $invoice_id = $_GET["invoice_id"];
        $invoice = new InvoiceUseCase();
        $invoiceData=$invoice->searchInvoiceById($invoice_id);

        $record = new MedicalDataUseCase();
        $recordList = $record->getMedicalDataById($invoiceData->record_id);
        $recordData = $recordList[0];

        $cost_id = $recordData->cost_id;
        $cost = new VisitCostUseCase;
        $costData = $cost->searchCostById($cost_id);
        $list_treatment_cost =[];
        $list_treatment_cost["treatment"]=$costData->treatment;
        $list_treatment_cost["price"] =$costData->price;
        $total_price=$list_treatment_cost["price"];
        $tgl=date('d M Y');
        $total_medicine_price=0;
        $list_medicine_cost =[];
        foreach($recordList as $data)
        {
            $array=[];
            $medicine = new MedicineUseCase;
            $medicineData = $medicine->getMedicineById($data->medicine_id);
            $array["medicine_name"]=$medicineData->medicine_name;
            $array["medicine_price"]=$medicineData->medicine_price;
            $array["medicine_qty"]=$data->qty_medicine;
            $array["medicine_total_price"]=$array["medicine_price"] * $array["medicine_qty"];
            $total_medicine_price+=$array["medicine_total_price"];
            $total_price+=$array["medicine_total_price"];
            array_push($list_medicine_cost, $array);
        }

        return view('Cashier/invoice', ['total_medicine_price' => $total_medicine_price,'total_price' => $total_price,'invoice_id' => $invoice_id, 'list_medicine_cost' => $list_medicine_cost, 'list_treatment_cost' => $list_treatment_cost, 'tgl'=>$tgl]);
    }

    public function proses_invoice(Request $request)
    {
        $invoice_id = $_GET["invoice_id"];
        $invoice_amount = $_GET["invoice_amount"];
        $invoice_method = $_GET["invoice_method"];
        $invoice_date=date('Y-m-d');

        $invoice = new InvoiceUseCase();
        $invoiceData=$invoice->updateInvoiceById($invoice_id,$invoice_amount, $invoice_date, $invoice_method,"Paid");
        return redirect('/cashier_add_invoice')->with('alert','Invoice berhasil ditambahkan');
    }
}
