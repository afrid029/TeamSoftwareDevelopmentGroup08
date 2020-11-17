<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_bookings', function (Blueprint $table) {
            
            $table->string('App_id');
            $table->string('Pat_id');
            $table->string('Doc_id');
            $table->date('availableDate');
            $table->time('availableTime',0);
            $table->foreign('Pat_id')->references('Pat_id')->on('patients');
            $table->foreign('Doc_id')->references('Doc_id')->on('doctors');
            $table->primary('App_id');
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
        Schema::dropIfExists('online_bookings');
    }
}
