<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::with('siswa')->get();

        return response()->json([
            'success' => true,
            'message' => 'Data kelas berhasil diambil',
            'data' => $kelas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kelas' => 'required|string|max:5',
            'tingkat' => 'required|in:X,XI,XII',
            'jurusan' => 'required|in:IPA,IPS,Bahasa',
        ]);

        $kelas = Kelas::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data kelas berhasil ditambahkan',
            'data' => $kelas
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kelas = Kelas::with('siswa')->find($id);

        if (!$kelas) {
            return response()->json([
                'success' => false,
                'message' => 'Data kelas tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data kelas berhasil ditemukan',
            'data' => $kelas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kelas = Kelas::find($id);

        if (!$kelas) {
            return response()->json([
                'success' => false,
                'message' => 'Data kelas tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'nama_kelas' => 'required|string|max:5',
            'tingkat' => 'required|in:X,XI,XII',
            'jurusan' => 'required|in:IPA,IPS,Bahasa',
        ]);


        $kelas->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data kelas berhasil diperbarui',
            'data' => $kelas
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelas = Kelas::find($id);

        if (!$kelas) {
            return response()->json([
                'success' => false,
                'message' => 'Data kelas tidak ditemukan'
            ], 404);
        }

        $kelas->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data kelas berhasil dihapus'
        ]);
    }
}
