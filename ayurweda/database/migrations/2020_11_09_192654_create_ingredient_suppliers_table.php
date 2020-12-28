<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_suppliers', function (Blueprint $table) {
            $table->string('Sup_id');
            $table->string('Sup_name');
            $table->string('Sup_addr');
            $table->string('Sup_pNum');
            $table->string('Sup_email');
            $table->string('password');
            $table->string('Sup_im')->nullable();
            $table->primary('Sup_id');
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
        Schema::dropIfExists('ingredient_suppliers');
    }
}
