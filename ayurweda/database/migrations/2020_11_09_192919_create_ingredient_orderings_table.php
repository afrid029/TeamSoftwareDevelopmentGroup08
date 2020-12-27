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
            $table->id();
            $table->longtext('Ingredients');
            $table->string('Pro_id');
            $table->string('Sup_id');
            $table->date('IngOrder_date');
            $table->string('status');
            $table->foreign('Pro_id')->references('Pro_id')->on('medicine_producers');
            $table->foreign('Sup_id')->references('Sup_id')->on('ingredient_suppliers');
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
