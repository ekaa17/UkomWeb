<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Kelurahan;

class PendudukController extends Controller
{
   
   public function index()
   {
       $penduduks = Penduduk::with('staff','kecamatan','kelurahan')->get(); 
       $staffs = Staff::all(); 
       $kecamatans = Kecamatan::all(); 
       $kelurahans = Kelurahan::all(); 
       return view('pages.penduduks.index', compact('penduduks', 'staffs','kecamatans','kelurahans'));
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
    // dd($request);
       $request->validate([
           'nik' => 'required|string|size:16|unique:penduduks,nik',
           'nama' => 'required|string|max:255',
           'alamat' => 'required|string',
           'id_staff' => 'required|exists:staff,id',
           'id_kecamatan' => 'required|exists:kecamatans,id',
           'id_kelurahan' => 'required|exists:kelurahans,id',
       ]);

       Penduduk::create($request->all());

       return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil ditambahkan!');
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, $id)
   {
       $penduduk = Penduduk::findOrFail($id);

       $request->validate([
           'nik' => 'required|string|size:16|unique:penduduks,nik,' . $penduduk->id,
           'nama' => 'required|string|max:255',
           'alamat' => 'required|string',
           'id_staff' => 'required|exists:staff,id',
           'id_kecamatan' => 'required|exists:kecamatans,id',
           'id_kelurahan' => 'required|exists:kelurahans,id',
       ]);

       $penduduk->update($request->all());

       return redirect()->route('penduduks.index')->with('success', 'Data penduduk berhasil diperbarui!');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy($id)
   {
       $penduduk = Penduduk::findOrFail($id);
       $penduduk->delete();

       return redirect()->route('penduduks.index')->with('success', 'Data penduduk berhasil dihapus!');
   }
}