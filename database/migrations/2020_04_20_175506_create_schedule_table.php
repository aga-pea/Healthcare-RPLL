<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->increments('schedule_id');
            $table->string('schedule_day');
            $table->string('schedule_time');
            $table->integer('total_patient_left');
            $table->integer('total_patient');
            $table->integer('medstaff_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->foreign('medstaff_id')->references('medstaff_id')->on('medical_staff');
            $table->foreign('department_id')->references('department_id')->on('department');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule');
    }
}
