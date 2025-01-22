<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::all();
        return view('pages.pelanggan.index', compact('pelanggans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
        ]);

        Pelanggan::create($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
        ]);

        $pelanggan->update($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui.');
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
    }
}

