<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->string('Pat_id');
            $table->string('Pat_name');
            $table->string('Pat_email');
            $table->string('Pat_addr');
            $table->string('Pat_pNum');
            $table->string('Pimage')->nullable();
            $table->date('dob');
            $table->string('gender');
            $table->string('guardian');
            $table->string('password');
            $table->primary('Pat_id');
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
        Schema::dropIfExists('patients');
    }
}
