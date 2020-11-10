<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewMedStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_med_stocks', function (Blueprint $table) {
            $table->id();
            $table->string('Pro_id');
            $table->string('Med_id');
            $table->string('Med_name');
            $table->integer('stock_qty');
            $table->foreign('Pro_id')->references('Pro_id')->on('medicine_producers');
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
        Schema::dropIfExists('new_med_stocks');
    }
}
