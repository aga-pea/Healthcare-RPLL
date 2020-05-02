<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_record', function (Blueprint $table) {
            $table->increments('record_id');
            $table->string('anamnesia',500);
            $table->integer('patient_id')->unsigned();
            $table->integer('disease_id')->unsigned();
            $table->integer('hospital_id')->unsigned();
            $table->integer('visit_id')->unsigned();
            $table->foreign('patient_id')->references('patient_id')->on('patient');
            $table->foreign('disease_id')->references('disease_id')->on('disease');
            $table->foreign('hospital_id')->references('hospital_id')->on('referral_hospital');
            $table->foreign('visit_id')->references('visit_id')->on('visit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_record');
    }
}
