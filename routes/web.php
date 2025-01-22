<?php

use App\Http\Controllers\DetailPembayaranController;
use App\Http\Controllers\HargaLaundryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
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
    Route::resource('/data-mahasiswa', MahasiswaController::class)->names('data-mahasiswa');
    Route::resource('/data-operator', StaffController::class)->names('data-operator');
    Route::resource('/penduduks', PendudukController::class)->names('penduduks');
    Route::resource('/pelanggan', PelangganController::class)->names('pelanggan');
    Route::resource('/harga-laundry', HargaLaundryController::class)->names('harga-laundry');
    Route::resource('/pembayaran_laundry', PembayaranLaundryController::class)->names('pembayaran_laundry');
    Route::resource('/detail-pembayaran', DetailPembayaranController::class)->names('detail-pembayaran');

});




