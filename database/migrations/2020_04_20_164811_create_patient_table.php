<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient', function (Blueprint $table) {
            $table->increments('patient_id');
            $table->string('patient_name',50);
            $table->string('patient_address',50);
            $table->integer('patient_age');
            $table->date('patient_dob');
            $table->char('patient_gender',1);
            $table->string('patient_uname',50);
            $table->string('patient_pwd',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient');
    }
}
