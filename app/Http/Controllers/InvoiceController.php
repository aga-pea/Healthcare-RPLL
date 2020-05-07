<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function AddInvoice(Request $request){
        $invoice_amount = $request->input('invoice_amount');
        $invoice_date = date('Y-m-d H:i:s');
        $invoice_method = $request->input('invoice_method');

        $doctor_id = $request->input('doctor_id');
        
        // Appointment::create([
        //     'invoice_amount' => $invoice_amount
        //     'invoice_date' => $invoice_date
        //     'invoice_method' => $invoice_method
        //     'patient_id' => $request->session()->get('patient_id')

        //     // TO DO : Input record_id ke database
        //     // 'record_id' =>
        // ]); 
     
    }

    public function UpdateInvoice(Request $request){
      
    }

}
