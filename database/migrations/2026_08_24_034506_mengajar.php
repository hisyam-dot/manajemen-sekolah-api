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
        Schema::create('mengajar', function (Blueprint $tabel){
            $tabel->id('id_mengajar');
            $tabel->foreignId('id_guru')
                ->constrained('guru', 'id_guru')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $tabel->foreignId('id_mapel')
                ->constrained('mata_pelajaran', 'id_mata_pelajaran')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $tabel->foreignId('id_kelas')
                ->constrained('kelas', 'id_kelas')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $tabel->string('tahun_ajaran', 4);
            $tabel->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::DropIfExist('mengajar');
    }
};
