<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pat_medicines', function (Blueprint $table) {
            $table->id();
            $table->string('Meeting_id');
            $table->string('Med_id');
            $table->foreign('Meeting_id')->references('Meeting_id')->on('medical_histories');
            $table->foreign('Med_id')->references('Med_id')->on('medicine_stocks');
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
        Schema::dropIfExists('pat_medicines');
    }
}
