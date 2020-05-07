<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_cost', function (Blueprint $table) {
            $table->increments('cost_id');
            $table->string('treatment',200);
            $table->integer('price');
            $table->integer('medstaff_id')->unsigned();
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
        Schema::dropIfExists('visit_cost');
    }
}

