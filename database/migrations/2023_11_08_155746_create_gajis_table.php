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
        Schema::create('gaji', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pegawai_id')->unsigned()->nullable();
            $table->string('gaji_pokok');
            $table->string('denda');
            $table->string('gaji_bersih');
            $table->date('tanggal');
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gaji', function (Blueprint $table) {
            $table->dropIfExists('gaji');
            $table->dropForeign(['pegawai_id']);
        });
    }
};
