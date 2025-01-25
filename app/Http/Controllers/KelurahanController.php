<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data kelurahan beserta relasi kecamatan
        $data = Kelurahan::with('kecamatan')->get();
        $kecamatan = Kecamatan::all();

        return view('pages.kelurahan.index', compact('data', 'kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'kode_kelurahan' => 'required|string|max:20', // Ubah ke string jika perlu
            'id_kecamatan' => 'required|exists:kecamatans,id',
            'nama_kelurahan' => 'required|string|max:255',
        ]);

        try {
            DB::transaction(function () use ($request) {
                Kelurahan::create($request->only(['kode_kelurahan', 'id_kecamatan', 'nama_kelurahan']));
            });
            return redirect()->route('kelurahan.index')->with('success', 'Data kelurahan berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->route('kelurahan.index')->with('error', 'Terjadi kesalahan saat menambahkan data: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Kelurahan::findOrFail($id);

        // Validasi data input
        $request->validate([
            'kode_kelurahan' => 'required|string|max:20', // Ubah ke string jika perlu
            'id_kecamatan' => 'required|exists:kecamatans,id',
            'nama_kelurahan' => 'required|string|max:255',
        ]);

        try {
            DB::transaction(function () use ($data, $request) {
                $data->update($request->only(['kode_kelurahan', 'id_kecamatan', 'nama_kelurahan']));
            });
            return redirect()->route('kelurahan.index')->with('success', 'Data kelurahan berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('kelurahan.index')->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Kelurahan::findOrFail($id);

        try {
            DB::transaction(function () use ($data) {
                $data->delete();
            });
            return redirect()->route('kelurahan.index')->with('success', 'Data kelurahan berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('kelurahan.index')->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}
