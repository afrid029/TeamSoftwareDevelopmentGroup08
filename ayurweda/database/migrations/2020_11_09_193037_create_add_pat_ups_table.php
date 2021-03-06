<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddPatUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_pat_ups', function (Blueprint $table) {
            $table->id();
            $table->string('Pat_id');
            $table->string('Doc_id');
            $table->text('medicines');
            $table->date('date');
            $table->text('condition');
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
        Schema::dropIfExists('add_pat_ups');
    }
}
