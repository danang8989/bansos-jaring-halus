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
        Schema::create('bantuans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jenis_bantuan_id');
            $table->unsignedBigInteger('penduduk_id');
            $table->foreign('penduduk_id')->on('penduduks')->references('id')->onDelete('cascade');
            $table->foreign('jenis_bantuan_id')->on('jenis_bantuans')->references('id')->onDelete('cascade');
            $table->integer('status');
            $table->date('tanggal_penyaluran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bantuans');
    }
};
