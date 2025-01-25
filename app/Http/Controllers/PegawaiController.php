<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Pegawai;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::with('staff')->get(); // Mengambil data penduduk beserta relasi staff
        $staffs = Staff::all(); // Mengambil data staff untuk dropdown
        $totalpegawai = Pegawai :: count();
        return view('pages.data-pegawai.index', compact('pegawai', 'staffs','totalpegawai'));
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'jabatan' => 'required|string',
            'jenis_kelamin' => 'required|string|max:255',
            'id_staff' => 'required|exists:staff,id',
        ]);
 
        Pegawai::create($request->all());
 
        return redirect()->route('data-pegawai.index')->with('success', 'Data Pegawai  berhasil ditambahkan!');
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Pegawai::findOrFail($id);
 
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'jabatan' => 'required|string',
            'jenis_kelamin' => 'required|string|max:255',
            'id_staff' => 'required|exists:staff,id',
        ]);
 
        $data->update($request->all());
 
        return redirect()->route('data-pegawai.index')->with('success', 'Data pegawai berhasil diperbarui!');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Pegawai::findOrFail($id);
        $data->delete();
 
        return redirect()->route('data-pegawai.index')->with('success', 'Data Pegawai berhasil dihapus!');
    }
}
