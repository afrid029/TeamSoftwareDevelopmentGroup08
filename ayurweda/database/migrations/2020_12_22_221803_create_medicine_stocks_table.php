<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_stocks', function (Blueprint $table) {
            $table->id();
            $table->string('Med_id');
            $table->string('Med_name');
            $table->float('unitprice',8,2);
            $table->integer('stock_qty');
            $table->integer('orders')->default(0);
            $table->integer('Wlimit');
            $table->text('description')->nullable();
            $table->date('manufactureDate');
            $table->date('expireDate');
            $table->foreign('Med_id')->references('Med_id')->on('medicines');
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
        Schema::dropIfExists('medicine_stocks');
    }
}
