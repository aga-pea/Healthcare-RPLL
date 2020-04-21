<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('vehicle_id');
            $table->string('vehicle_type',50);
            $table->boolean('vehicle_availability');
            $table->integer('nonmed_id')->unsigned();
            $table->foreign('nonmed_id')->references('nonmed_id')->on('nonmedical_staff');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
