<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineOrderingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_orderings', function (Blueprint $table) {
            $table->string('MedOrder_id');
            $table->string('Med_id');
            $table->integer('Med_qty');
            $table->string('Pro_id');
            $table->string('Phar_id');
            $table->date('MedOrder_date');
            $table->foreign('Med_id')->references('Med_id')->on('medicine_stocks');
            $table->foreign('Pro_id')->references('Pro_id')->on('medicine_producers');
            $table->foreign('Phar_id')->references('Phar_id')->on('pharmacists');
            $table->primary('MedOrder_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicine_orderings');
    }
}
