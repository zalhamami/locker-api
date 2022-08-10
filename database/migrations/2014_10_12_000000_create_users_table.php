<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // dosen / mahasiswa/i / tamu
            $table->string('nim')->nullable(); // mahasiswa/i
            $table->string('nip')->nullable(); //dosen
            $table->string('jurusan')->nullable(); //mahasiswa/i
            $table->string('program_studi')->nullable(); // mahasiswa/i
            $table->string('email')->unique(); // Tamu / dosen / mahasiswa/i
            $table->string('institusi')->nullable(); // Tamu
            $table->string('password'); // semua
            $table->string('role_status'); // 1 = admin, 2 = dosen, 3 = mahasiswa, 4 = tamu
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
        Schema::dropIfExists('users');
    }
}
