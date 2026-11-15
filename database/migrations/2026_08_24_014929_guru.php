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
        Schema::create('guru', function (Blueprint $tabel) {
            $tabel->id('id_guru');
            $tabel->string('nip', 10)->unique();
            $tabel->string('nama', 25);
            $tabel->enum('jenis_kelamin', ['L', 'P']);
            $tabel->string('email')->unique();
            $tabel->string('no_hp', 15)->unique();
            $tabel->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};
