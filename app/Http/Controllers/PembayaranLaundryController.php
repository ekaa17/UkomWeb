<?php

namespace App\Http\Controllers;

use App\Models\PembayaranLaundry;
use App\Models\Staff;
use App\Models\Pelanggan;
use App\Models\HargaLaundry;
use Illuminate\Http\Request;

class PembayaranLaundryController extends Controller
{
    public function index()
    {
        $pembayaran = PembayaranLaundry::with(['staff', 'pelanggan', 'hargaLaundry'])->get();
        $staff = Staff::all();
        $pelanggan = Pelanggan::all();
        $hargalaundries = HargaLaundry::all();

        return view('pages.pembayaran.index', compact('pembayaran', 'staff', 'pelanggan', 'hargalaundries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_staff' => 'required|exists:staff,id',
            'id_pelanggan' => 'required|exists:pelanggans,id',
            'id_hargalaundries' => 'required|exists:hargalaundries,id',
        ]);

        PembayaranLaundry::create($request->all());

        return redirect()->route('pembayaran_laundry.index')->with('success', 'Pembayaran laundry berhasil ditambahkan.');
    }

    public function update(Request $request, PembayaranLaundry $pembayaran_laundry)
    {
        $request->validate([
            'id_staff' => 'required|exists:staff,id',
            'id_pelanggan' => 'required|exists:pelanggans,id',
            'id_hargalaundries' => 'required|exists:hargalaundries,id',
        ]);

        $pembayaran_laundry->update($request->all());

        return redirect()->route('pembayaran_laundry.index')->with('success', 'Pembayaran laundry berhasil diperbarui.');
    }

    public function destroy(PembayaranLaundry $pembayaran_laundry)
    {
        $pembayaran_laundry->delete();

        return redirect()->route('pembayaran_laundry.index')->with('success', 'Pembayaran laundry berhasil dihapus.');
    }
}
