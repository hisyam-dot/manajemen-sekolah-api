<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GuruController;
use App\Http\Controllers\Api\KelasController;
use App\Http\Controllers\Api\MataPelajaranController;
use App\Http\Controllers\Api\SiswaController;
use App\Http\Controllers\Api\MengajarController;

Route::get('/', function () {
    return response()->json([
        'succes' =>true,
        'message' => 'API sekolah berhasil dijalankan'
    ]);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/user/{id}', [AuthController::class, 'show']);

Route::middleware('auth:sanctum')->group(function() {
    Route::apiResource('siswa', SiswaController::class);
    Route::apiResource('mengajar', MengajarController::class);
});

Route::apiResource('guru', GuruController::class);
Route::apiResource('kelas', KelasController::class);
Route::apiResource('mata-pelajaran', MataPelajaranController::class);
