<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddPatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_pats', function (Blueprint $table) {
            $table->id();
            $table->string('Pat_id');
            $table->string('disease');
            $table->date('ad_date');
            $table->date('disch_date')->nullable();
            $table->string('Doc_id');
            $table->string('bedno');
            $table->string('status');
            $table->foreign('Pat_id')->references('Pat_id')->on('patients');
            $table->foreign('Doc_id')->references('Doc_id')->on('doctors');
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
        Schema::dropIfExists('add_pats');
    }
}
