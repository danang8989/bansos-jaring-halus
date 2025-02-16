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
        Schema::table('konsumsis', function (Blueprint $table) {
            $table->unsignedBigInteger('penduduk_id');
            $table->foreign('penduduk_id')->on('penduduks')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('konsumsis', function (Blueprint $table) {
            $table->dropForeign(['penduduk_id']);
            $table->dropColumn('penduduk_id');
        });
    }
};
