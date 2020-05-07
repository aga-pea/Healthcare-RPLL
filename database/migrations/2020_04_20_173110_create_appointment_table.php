<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->increments('appt_id');
            $table->string('appt_day');
            $table->string('appt_time');
            $table->string('appt_status');
            $table->integer('patient_id')->unsigned();
            $table->integer('medstaff_id')->unsigned();
            $table->foreign('patient_id')->references('patient_id')->on('patient');
            $table->foreign('medstaff_id')->references('medstaff_id')->on('medical_staff');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment');
    }
}
