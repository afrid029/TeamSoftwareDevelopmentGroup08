<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientOrderingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_orderings', function (Blueprint $table) {
            $table->string('IngOrder_id');
            $table->string('Ing_id');
            $table->integer('Ing_qty');
            $table->string('Pro_id');
            $table->string('Sup_id');
            $table->date('MedOrder_date');
            $table->foreign('Pro_id')->references('Pro_id')->on('medicine_producers');
            $table->foreign('Sup_id')->references('Sup_id')->on('ingredient_suppliers');
            $table->primary('IngOrder_id');
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
        Schema::dropIfExists('ingredient_orderings');
    }
}
