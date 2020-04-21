<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_room', function (Blueprint $table) {
            $table->increments('room_no');
            $table->integer('room_capacity');
            $table->boolean('room_availability');
            $table->integer('patient_id')->unsigned();
            $table->integer('electronic_id')->unsigned();
            $table->integer('medstaff_id')->unsigned();
            $table->integer('util_id')->unsigned();
            $table->foreign('patient_id')->references('patient_id')->on('patient');
            $table->foreign('medstaff_id')->references('medstaff_id')->on('medical_staff');
            $table->foreign('electronic_id')->references('electronic_id')->on('electronics');
            $table->foreign('util_id')->references('util_id')->on('medical_utilities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_room');
    }
}
