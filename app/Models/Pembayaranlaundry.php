<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaranlaundry extends Model
{
    use HasFactory;

    protected $table = 'pembayaranlaundries';

    // Kolom yang dapat diisi
    protected $fillable = [
        'id_staff',
        'id_pelanggan',
        'id_hargalaundries',
    ];

    /**
     * Relasi ke tabel staff
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'id_staff','id');
    }

    /**
     * Relasi ke tabel pelanggan
     */
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan','id');
    }

    /**
     * Relasi ke tabel harga laundries
     */
    public function hargaLaundry()
    {
        return $this->belongsTo(HargaLaundry::class, 'id_hargalaundries','id');
    }

    public function detailPembayarans()
    {
        return $this->hasMany(DetailPembayaran::class, 'id_pembayaranlaundries');
    }
}
