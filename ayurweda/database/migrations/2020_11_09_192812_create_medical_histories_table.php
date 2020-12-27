<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->string('Meeting_id');
            $table->string('Pat_id');
            $table->string('Doc_id');
            $table->text('diagnosis');
            $table->string('disease');
            $table->text('medicine');
            $table->double('bill');
            $table->text('issued')->default("Not Issued");
            $table->foreign('Pat_id')->references('Pat_id')->on('patients');
            $table->foreign('Doc_id')->references('Doc_id')->on('doctors');
            $table->primary('Meeting_id');
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
        Schema::dropIfExists('medical_histories');
    }
}
