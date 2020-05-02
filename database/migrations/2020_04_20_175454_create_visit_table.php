<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit', function (Blueprint $table) {
            $table->increments('visit_id');
            $table->integer('qty_medicine');
            $table->integer('medicine_id')->unsigned();
            $table->integer('cost_id')->unsigned();
            $table->foreign('medicine_id')->references('medicine_id')->on('medicine');
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
        Schema::dropIfExists('visit');
    }
}
