<?php

use App\Http\Controllers\DetailPembayaranController;
use App\Http\Controllers\HargaLaundryController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembayaranLaundryController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\StaffController;
use App\Models\DetailPembayaran;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('/login');
});


Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);


Route::group(['middleware' => 'cekrole:Admin,Karyawan'], function() {
    Route::get('/dashboard', [LoginController::class, 'dashboard']);
    Route::resource('/data-pegawai', PegawaiController::class)->names('data-pegawai');
    Route::resource('/kecamatan', KecamatanController::class)->names('kecamatan');
    Route::resource('/kelurahan', KelurahanController::class)->names('kelurahan');
    Route::resource('/penduduk', PendudukController::class)->names('penduduk');
    Route::resource('/data-operator', StaffController::class)->names('data-operator');
  

});




