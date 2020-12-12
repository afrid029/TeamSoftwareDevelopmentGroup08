<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddSymptompsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_symptomps', function (Blueprint $table) {
            $table->id('id');
            $table->string('Doc_id');
            $table->string('Pat_id');
            $table->longText('text')->nullable();
            $table->string('img')->nullable();
            $table->string('audio')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
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
        Schema::dropIfExists('add_symptomps');
    }
}
