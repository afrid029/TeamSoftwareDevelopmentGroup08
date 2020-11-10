<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocAvailableTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_available_times', function (Blueprint $table) {
            $table->id();
            $table->string('Doc_id');
            $table->date('availableDate');
            $table->time('availableTime',0);
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
        Schema::dropIfExists('doc_available_times');
    }
}
