<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelAppLokersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_loker', function (Blueprint $table) {
            $table->id();
            $table->string('text')->nullable(); // nim
            $table->string('loker')->nullable(); // no loker
            $table->string('status_active')->nullable(); //status active
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_app_lokers');
    }
}
