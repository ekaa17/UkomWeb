<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::all(); // Mengambil semua data Mahasiswa
        $Mahasiswa = Mahasiswa::count();
        return view('pages.data-mahasiswa.index', compact('data','Mahasiswa'));
    }

    /**
     * Simpan data mahasiswa baru.
     */
    public function store(Request $request)
    {
        // dd($request);
        // Validasi data yang diterima dari request
        $request->validate([
            'email' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',

        ]);

        // Simpan data ke database
        Mahasiswa::create([
            'email' => $request->email,
            'nama' => $request->nama,
            'nim' => $request->nim,
            'alamat' => $request->alamat,
            'jurusan' => $request->jurusan,

        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('data-mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    /**
     * Update data mahasiswa yang ada.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari request
        $request->validate([
            'email' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
        ]);

        // Cari mahasiswa berdasarkan ID dan update datanya
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update([
            'email' => $request->email,
            'nama' => $request->nama,
            'nim' => $request->nim,
            'alamat' => $request->alamat,
            'jurusan' => $request->jurusan,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('data-mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui');
    }

    /**
     * Hapus data mahasiswa.
     */
    public function destroy($id)
    {
        // Cari mahasiswa berdasarkan ID dan hapus
        $data = Mahasiswa::findOrFail($id);
        $data->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('data-mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus');
    }
}
