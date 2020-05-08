<?php
    namespace App\Dao;
    use App\Invoice;
    use Illuminate\Support\Facades\DB;

    class InvoiceDao
    {
        public static function createInvoice($invoice_date, $patient_id, $visit_id, $status)
        {
            Invoice::create([
                'invoice_date' => $invoice_date,
                'patient_id' => $patient_id,
                'visit_id' => $visit_id,
                'invoice_status' => $status
            ]); 
        }

        public static function getInvoiceByStatus($invoice_status)
        {
            $invoice = Invoice::where('invoice_status',$invoice_status)->get();
            return $invoice;
        }

        public static function getInvoiceByPatientStatus($patient_id,$status)
        {
            $invoice = Invoice::where('invoice_status',$status)->where('patient_id',$patient_id)->get();
            return $invoice;
        }
    }
?>