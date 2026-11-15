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
        Schema::create('kelas', function (Blueprint $tabel) {
            $tabel->id('id_kelas');
            $tabel->string('nama_kelas', 5);
            $tabel->enum('tingkat', ['X', 'XI', 'XII']);
            $tabel->enum('jurusan', ['IPA', 'IPS', 'Bahasa']);
            $tabel->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
