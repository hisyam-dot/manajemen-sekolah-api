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
        Schema::create('siswa', function (Blueprint $tabel) {
            $tabel->id('id_siswa');
            $tabel->string('nis', 10)->unique();
            $tabel->string('nama', 50);
            $tabel->enum('jenis_kelamin', ['L', 'P']);
            $tabel->string('alamat', 50);
            $tabel->date('tanggal_lahir');
            $tabel->foreignId('id_kelas')
                ->constrained('kelas', 'id_kelas')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $tabel->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExist('siswa');
    }
};
