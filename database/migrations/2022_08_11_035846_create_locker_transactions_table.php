<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLockerTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locker_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('locker_id');
            $table->enum('status', ['open', 'close']);
            $table->morphs('user');
            $table->timestamps();

            $table->foreign('locker_id')->references('id')->on('lockers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locker_transactions');
    }
}
