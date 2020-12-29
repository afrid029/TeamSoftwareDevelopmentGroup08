<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineProducersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_producers', function (Blueprint $table) {
            $table->string('Pro_id');
            $table->string('Pro_name');
            $table->string('Pro_addr')->nullable();
            $table->string('Pro_pNum')->nullable();
            $table->string('Pro_email');
            $table->string('password');
            $table->string('Pro_im')->nullable();
            $table->primary('Pro_id');
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
        Schema::dropIfExists('medicine_producers');
    }
}
