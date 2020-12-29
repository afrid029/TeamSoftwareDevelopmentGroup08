<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmacistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacists', function (Blueprint $table) {
            $table->string('Phar_id');
            $table->string('Phar_name');
            $table->string('Phar_addr')->nullable();
            $table->string('Phar_pNum')->nullable();
            $table->string('Phar_email');
            $table->string('PImage')->nullable();
            $table->string('password');
            $table->primary('Phar_id');
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
        Schema::dropIfExists('pharmacists');
    }
}
