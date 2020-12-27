<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatMedOrderingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pat_med_orderings', function (Blueprint $table) {
            $table->string('PatMedOrder_id');
            $table->string('Pat_id');
            $table->text('medicines');
            $table->date('PatMedOrder_date');
            $table->string('status')->default('Unrecieved');
            $table->double('bill')->nullable();
            $table->foreign('Pat_id')->references('Pat_id')->on('patients');
            $table->primary('PatMedOrder_id');
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
        Schema::dropIfExists('pat_med_orderings');
    }
}
