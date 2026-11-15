<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::with('mengajars')->get();

        return response()->json([
            'success' => true,
            'message' => 'Data guru berhasil diambil',
            'data' => $guru
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|string|max:10|unique:guru,nip',
            'nama' => 'required|string|max:25',
            'jenis_kelamin' => 'required|in:L,P',
            'email' => 'required|email|max:100|unique:guru,email',
            'no_hp' => 'nullable|string|max:15',
        ]);

        $guru = Guru::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data guru berhasil ditambahkan',
            'data' => $guru
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $guru = Guru::with('mengajar')->find($id);

        if (!$guru) {
            return response()->json([
                'success' => false,
                'message' => 'Data guru tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data guru berhasil ditemukan',
            'data' => $guru
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $guru = Guru::find($id);

        if (!$guru) {
            return response()->json([
                'success' => false,
                'message' => 'Data guru tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'nip' => 'required|string|max:10|unique:guru,nip,' . $id . ',id_guru',
            'nama' => 'required|string|max:25',
            'jenis_kelamin' => 'required|in:L,P',
            'email' => 'required|email|max:100|unique:guru,email,' . $id . ',id_guru',
            'no_hp' => 'nullable|string|max:15',
        ]);

        $guru->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data guru berhasil diperbarui',
            'data' => $guru
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guru = Guru::find($id);

        if (!$guru) {
            return response()->json([
                'success' => false,
                'message' => 'Data guru tidak ditemukan'
            ], 404);
        }

        $guru->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data guru berhasil dihapus'
        ]);
    }
}
