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
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_kk');
            $table->string('nik');
            $table->string('jenis_kelamin');
            $table->string('hubungan_keluarga');
            $table->string('tempat_lahir');
            $table->string('agama');
            $table->integer('disabilitas');
            $table->string('pendidikan_terakhir');
            $table->integer('umur');
            $table->string('pekerjaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduks');
    }
};
