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
        Schema::create('mata_pelajaran', function (Blueprint $tabel) {
            $tabel->id('id_mata_pelajaran');
            $tabel->string('kode_mapel', 10)->unique();
            $tabel->string('nama_mapel', 20);
            $tabel->string('jumlah_jp', 5);
            $tabel->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExist('mata_pelajaran');
    }
};
