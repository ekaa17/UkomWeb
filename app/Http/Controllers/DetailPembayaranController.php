<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPembayaran;
use App\Models\HargaLaundry;
use App\Models\PembayaranLaundry;

class DetailPembayaranController extends Controller
{
    /**
     * Tampilkan halaman detail pembayaran.
     */
    public function show($id)
    {
        $pembayaranLaundry = PembayaranLaundry::with(['staff', 'pelanggan', 'hargaLaundry'])->findOrFail($id);
        $hargaLaundries = HargaLaundry::all();
        $detail_pembayaran = DetailPembayaran::with('hargalaundry')->where('id_pembayaranlaundries', $id)->get();

        return view('pages.pembayaran.show', compact('pembayaranLaundry', 'hargaLaundries', 'detail_pembayaran'));
    }

    /**
     * Tambah detail pembayaran baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pembayaranlaundries' => 'required|exists:pembayaranlaundries,id',
            'produk' => 'required|exists:hargalaundries,id',
            'quantity' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
        ]);

        DetailPembayaran::create([
            'id_pembayaranlaundries' => $request->id_pembayaranlaundries,
            'id_hargalaundries' => $request->produk,
            'quantity' => $request->quantity,
            'total' => $request->total,
        ]);

        return redirect()->route('detail-pembayaran.show', $request->id_pembayaranlaundries)
                         ->with('success', 'Detail pembayaran berhasil ditambahkan.');
    }

    /**
     * Hapus detail pembayaran.
     */
    public function destroy($id)
    {
        $detailPembayaran = DetailPembayaran::findOrFail($id);
        $pembayaranLaundryId = $detailPembayaran->id_pembayaranlaundries;

        $detailPembayaran->delete();

        return redirect()->route('detail-pembayaran.show', $pembayaranLaundryId)
                         ->with('success', 'Detail pembayaran berhasil dihapus.');
    }
}
