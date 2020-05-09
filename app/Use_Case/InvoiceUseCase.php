<?php

namespace App\Use_Case;

use App\Dao\InvoiceDao;

class InvoiceUseCase
{
    public static function addInvoice($invoice_amount, $invoice_date,$invoice_method,$invoice_status,$patient_id,$record_id)
    {
        $invoice = new InvoiceDao();
        $invoice->createInvoice($invoice_amount, $invoice_date,$invoice_method,$invoice_status,$patient_id,$record_id);
    }

    public static function searchInvoiceByStatus($invoice_status)
    {
        $invoice = new InvoiceDao();
        $invoiceData = $invoice->getInvoiceByStatus($invoice_status);
        return $invoiceData;
    }

    public static function searchInvoiceByPatientStatus($patient_id,$status)
    {
        $invoice = new InvoiceDao();
        $invoiceData = $invoice->getInvoiceByPatientStatus($patient_id,$status);
        return $invoiceData;
    }

    public static function searchInvoiceById($invoice_id)
    {
        $invoice = new InvoiceDao();
        $invoiceData = $invoice->getInvoiceById($invoice_id);
        return $invoiceData;
    }

    public static function updateInvoiceById($invoice_id,$invoice_amount, $invoice_date, $invoice_method,$status)
    {
        $invoice = new InvoiceDao();
        $invoice->updateInvoiceById($invoice_id,$invoice_amount, $invoice_date, $invoice_method,$status);
    }

    public static function updateInvoiceMethodById($invoice_id,$invoice_method)
    {
        $invoice = new InvoiceDao();
        $invoice->updateInvoiceMethodById($invoice_id,$invoice_method);
    }
}