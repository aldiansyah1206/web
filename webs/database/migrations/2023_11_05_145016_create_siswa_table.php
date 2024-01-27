<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kelas_id');
            $table->string('nama');
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('password');
            $table->text('alamat');
            $table->enum('jenis_kelamin', ["p", "l"]);
            $table->timestamps();

            $table->foreign('kelas_id')->references('id')->on('kelas');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
