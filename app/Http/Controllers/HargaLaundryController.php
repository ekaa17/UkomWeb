<?php

namespace App\Http\Controllers;

use App\Models\HargaLaundry;
use Illuminate\Http\Request;

class HargaLaundryController extends Controller
{
    // Menampilkan semua data Harga Laundry
    public function index()
    {
        $hargakilo = HargaLaundry::all(); // Mengambil semua data
        return view('pages.harga-laundry.index', compact('hargakilo'));
    }

    // Menyimpan data baru ke tabel harga_laundry
    public function store(Request $request)
    {
        $request->validate([
            'berat' => 'required|integer|min:1', // Validasi berat minimal 1
            'harga' => 'required|numeric|min:0', // Validasi harga minimal 0
        ]);

        HargaLaundry::create([
            'berat' => $request->berat,
            'harga' => $request->harga,
        ]);

        return redirect()->route('harga_laundry.index')->with('success', 'Harga Laundry berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit(HargaLaundry $hargaLaundry)
    {
        return view('pages.harga_laundry.edit', compact('hargaLaundry'));
    }

    // Memperbarui data
    public function update(Request $request, HargaLaundry $hargaLaundry)
    {
        $request->validate([
            'berat' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
        ]);

        $hargaLaundry->update([
            'berat' => $request->berat,
            'harga' => $request->harga,
        ]);

        return redirect()->route('harga_laundry.index')->with('success', 'Harga Laundry berhasil diperbarui.');
    }

    // Menghapus data
    public function destroy(HargaLaundry $hargaLaundry)
    {
        $hargaLaundry->delete();

        return redirect()->route('harga_laundry.index')->with('success', 'Harga Laundry berhasil dihapus.');
    }
}
