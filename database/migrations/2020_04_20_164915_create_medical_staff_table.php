<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_staff', function (Blueprint $table) {
            $table->increments('medstaff_id');
            $table->integer('medstaff_age');
            $table->string('medstaff_name',50);
            $table->string('medstaff_uname',50);
            $table->string('medstaff_pwd',20);
            $table->integer('department_id')->unsigned();
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
        Schema::dropIfExists('medical_staff');
    }
}
