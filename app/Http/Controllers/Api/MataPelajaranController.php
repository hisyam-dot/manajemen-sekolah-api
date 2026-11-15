<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mapel = MataPelajaran::with('mengajar')->get();

        return response()->json([
            'success' => true,
            'message' => 'Data mata pelajaran berhasil diambil',
            'data' => $mapel
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_mapel' => 'required|string|max:10|unique:mata_pelajaran,kode_mapel',
            'nama_mapel' => 'required|string|max:20',
            'jumlah_jp' => 'required|string|max:5',
        ]);

        $mapel = MataPelajaran::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data mata pelajaran berhasil ditambahkan',
            'data' => $mapel
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mapel = MataPelajaran::with('mengajars')->find($id);

        if (!$mapel) {
            return response()->json([
                'success' => false,
                'message' => 'Data mata pelajaran tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data mata pelajaran berhasil ditemukan',
            'data' => $mapel
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mapel = MataPelajaran::find($id);

        if (!$mapel) {
            return response()->json([
                'success' => false,
                'message' => 'Data mata pelajaran tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'kode_mapel' => 'required|string|max:10|unique:mata_pelajaran,kode_mapel,' . $id . ',id_mapel',
            'nama_mapel' => 'required|string|max:20',
            'jumlah_jp' => 'required|string|max:5',
        ]);

        $mapel->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data mata pelajaran berhasil diperbarui',
            'data' => $mapel
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mapel = MataPelajaran::find($id);

        if (!$mapel) {
            return response()->json([
                'success' => false,
                'message' => 'Data mata pelajaran tidak ditemukan'
            ], 404);
        }

        $mapel->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data mata pelajaran berhasil dihapus'
        ]);
    }
}
