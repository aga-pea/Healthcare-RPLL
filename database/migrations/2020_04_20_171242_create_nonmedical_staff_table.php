<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNonmedicalStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nonmedical_staff', function (Blueprint $table) {
            $table->increments('nonmed_id');
            $table->string('nonmed_name',50);
            $table->string('nonmed_job',50);
            $table->string('nonmed_uname',50);
            $table->string('nonmed_pwd',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nonmedical_staff');
    }
}
