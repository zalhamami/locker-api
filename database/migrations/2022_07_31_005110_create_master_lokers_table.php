<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterLokersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_lokers', function (Blueprint $table) {
            $table->id();
            $table->string('nomer_loker')->nullable(); // nomer
            $table->string('nama_loker')->nullable(); // nama
            $table->string('status_loker')->nullable(); // status
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
        Schema::dropIfExists('master_lokers');
    }
}
