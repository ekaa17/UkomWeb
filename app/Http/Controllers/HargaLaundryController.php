<?php

namespace App\Http\Controllers;

use App\Models\HargaLaundry;
use Illuminate\Http\Request;

class HargaLaundryController extends Controller
{
    /**
     * Menampilkan daftar harga laundry.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil semua data harga laundry
        $hargakilo = HargaLaundry::all();
        return view('pages.harga-laundry.index', compact('hargakilo'));
    }

    /**
     * Menampilkan form untuk menambah data harga laundry.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('harga-laundry.create');
    }

    /**
     * Menyimpan data harga laundry baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'jenis_layanan' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'unit' => 'required|string|max:50',
        ]);

        // Menyimpan data harga laundry
        HargaLaundry::create($validated);

        // Menampilkan pesan sukses
        return redirect()->route('harga-laundry.index')->with('success', 'Harga Laundry berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data harga laundry.
     *
     * @param  \App\Models\HargaLaundry  $hargaLaundry
     * @return \Illuminate\View\View
     */
    public function edit(HargaLaundry $hargaLaundry)
    {
        return view('harga-laundry.edit', compact('hargaLaundry'));
    }

    /**
     * Memperbarui data harga laundry yang ada.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HargaLaundry  $hargaLaundry
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, HargaLaundry $hargaLaundry)
    {
        // Validasi data input
        $validated = $request->validate([
            'jenis_layanan' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'unit' => 'required|string|max:50',
        ]);

        // Memperbarui data harga laundry
        $hargaLaundry->update($validated);

        // Menampilkan pesan sukses
        return redirect()->route('harga-laundry.index')->with('success', 'Harga Laundry berhasil diperbarui.');
    }

    /**
     * Menghapus data harga laundry.
     *
     * @param  \App\Models\HargaLaundry  $hargaLaundry
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(HargaLaundry $hargaLaundry)
    {
        // Menghapus data harga laundry
        $hargaLaundry->delete();

        // Menampilkan pesan sukses
        return redirect()->route('harga-laundry.index')->with('success', 'Harga Laundry berhasil dihapus.');
    }
}
