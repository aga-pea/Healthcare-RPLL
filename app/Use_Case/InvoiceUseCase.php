<?php

namespace App\Use_Case;

use App\Dao\InvoiceDao;

class InvoiceUseCase
{
    public static function addInvoice($invoice_date,$patient_id,$visit_id,$status)
    {
        $invoice = new InvoiceDao();
        $invoice->createInvoice($invoice_date, $patient_id, $visit_id, $status);
    }

    public static function searchInvoiceByStatus($invoice_status)
    {
        $invoice = new InvoiceDao();
        $invoiceData = $invoice->getInvoiceByStatus($invoice_status);
        return $invoiceData;
    }
}