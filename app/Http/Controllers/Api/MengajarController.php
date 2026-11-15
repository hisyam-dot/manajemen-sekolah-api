<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mengajar;
use Illuminate\Http\Request;

class MengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mengajars = Mengajar::with([
            'guru',
            'mataPelajaran',
            'kelas'
        ])->get();

        return response()->json([
            'success' => true,
            'message' => 'Data mengajar berhasil diambil',
            'data' => $mengajars
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_guru' => 'required|exists:guru,id_guru',
            'id_mapel' => 'required|exists:mata_pelajaran,id_mata_pelajaran',
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'tahun_ajaran' => 'required|string|max:20',
        ]);

        $mengajar = Mengajar::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data mengajar berhasil ditambahkan',
            'data' => $mengajar
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mengajar = Mengajar::with([
            'guru',
            'mataPelajaran',
            'kelas'
        ])->find($id);

        if (!$mengajar) {
            return response()->json([
                'success' => false,
                'message' => 'Data mengajar tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data mengajar berhasil ditemukan',
            'data' => $mengajar
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!$mengajar) {
            return response()->json([
                'success' => false,
                'message' => 'Data mengajar tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'id_guru' => 'required|exists:guru,id_guru',
            'id_mapel' => 'required|exists:mata_pelajaran,id_mapel',
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'tahun_ajaran' => 'required|string|max:20',
        ]);

        $mengajar->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data mengajar berhasil diperbarui',
            'data' => $mengajar
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mengajar = Mengajar::find($id);

        if (!$mengajar) {
            return response()->json([
                'success' => false,
                'message' => 'Data mengajar tidak ditemukan'
            ], 404);
        }

        $mengajar->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data mengajar berhasil dihapus'
        ]);
    }
}
