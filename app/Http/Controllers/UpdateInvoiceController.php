<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Use_Case\InvoiceUseCase;
use App\Use_Case\PatientUseCase;
use App\Use_Case\VisitCostUseCase;
use App\Use_Case\MedicineUseCase;
use App\Use_Case\MedicalDataUseCase;

class UpdateInvoiceController extends Controller
{
    public function index()
    {
        $invoice = new InvoiceUseCase();
        $invoiceAll = $invoice->searchInvoiceByStatus("Paid");
        $invoicelist=[];
        foreach($invoiceAll as $data)
        {
            $array = [];
            $array["invoice_id"]=$data->invoice_id;
            $array["date"]=$data->invoice_date;
            $array["amount"]=$data->invoice_amount;
            $array["method"]=$data->invoice_method;
            $patient = new PatientUseCase();
            $patientData = $patient->getPatientById($data->patient_id);
            $array["patient_name"]=$patientData->patient_name;

            array_push($invoicelist, $array);
        }
        return view('Cashier/invoice_update_main',["invoice_list" => $invoicelist]);
    }

    public static function detail()
    {
        $invoice_id = $_GET["invoice_id"];
        $invoice = new InvoiceUseCase();
        $invoiceData=$invoice->searchInvoiceById($invoice_id);
        $invoice_method = $invoiceData->invoice_method;

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

        return view('Cashier/invoice_update_detail', ['invoice_method'=>$invoice_method,'total_medicine_price' => $total_medicine_price,'total_price' => $total_price,'invoice_id' => $invoice_id, 'list_medicine_cost' => $list_medicine_cost, 'list_treatment_cost' => $list_treatment_cost, 'tgl'=>$tgl]);
    }

    public static function proses(Request $request)
    {
        $invoice_id = $_GET["invoice_id"];
        $invoice_method = $_GET["invoice_method"];

        $invoice = new InvoiceUseCase();
        $invoice->updateInvoiceMethodById($invoice_id,$invoice_method);
        return redirect("/cashier_update_invoice")->with('alert','Invoice Berhasil diupdate');
    }
}
