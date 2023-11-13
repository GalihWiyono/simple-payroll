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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("pegawai_id")->unsigned()->nullable();
            $table->date("tanggal");
            $table->time('waktu_absensi');
            $table->enum('status', ['Ontime', 'Terlambat']);
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('absensi', function (Blueprint $table) {
            $table->dropIfExists('absensi');
            $table->dropForeign(['pegawai_id']);
        });
    }
};
