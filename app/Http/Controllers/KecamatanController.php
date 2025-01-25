<?php

namespace App\Http\Controllers;

use App\Models\keca;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kecamatan;

class KecamatanController extends Controller
{
    public function index()
    {
        $kecamatan = Kecamatan :: all(); // Mengambil data penduduk beserta relasi staff
        return view('pages.kecamatan.index', compact('kecamatan',));
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_kecamatan' => 'required|string|max:255',
            'nama_kecamatan' => 'required|string',
        ]);
 
        kecamatan::create($request->all());
 
        return redirect()->route('kecamatan.index')->with('success', 'Data Kecamatan berhasil ditambahkan!');
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = kecamatan::findOrFail($id);
 
        $request->validate([
            'kode_kecamatan' => 'required|string|max:255',
            'nama_kecamatan' => 'required|string',
        ]);
 
        $data->update($request->all());
 
        return redirect()->route('kecamatan.index')->with('success', 'Data Kecamatan berhasil diperbarui!');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = kecamatan::findOrFail($id);
        $data->delete();
 
        return redirect()->route('kecamatan.index')->with('success', 'Data Kecamatan berhasil dihapus!');
    }
}
