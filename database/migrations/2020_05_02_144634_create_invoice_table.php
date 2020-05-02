<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->increments('invoice_id');
            $table->integer('invoice_amount');
            $table->date('invoice_date');
            $table->string('invoice_method',50);
            $table->integer('patient_id')->unsigned();
            $table->integer('cost_id')->unsigned();
            $table->foreign('patient_id')->references('patient_id')->on('patient');
            $table->foreign('cost_id')->references('cost_id')->on('visit_cost');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice');
    }
}
