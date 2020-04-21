<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine', function (Blueprint $table) {
            $table->increments('medicine_id');
            $table->date('medicine_exp_date');
            $table->integer('medicine_level');
            $table->string('medicine_name',30);
            $table->integer('medicine_price');
            $table->integer('medicine_qty');
            $table->string('medicine_type',30);
            $table->string('medicine_vendor',30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicine');
    }
}
