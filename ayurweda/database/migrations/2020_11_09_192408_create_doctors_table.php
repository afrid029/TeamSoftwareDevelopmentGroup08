<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->string('Doc_id');
            $table->string('Doc_name');
            $table->string('Doc_email');
            $table->string('Doc_addr')->nullable();
            $table->string('Doc_pNum')->nullable();
            $table->string('password');
            $table->string('Doc_im')->nullable();
            $table->primary('Doc_id');
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
        Schema::dropIfExists('doctors');
    }
}
