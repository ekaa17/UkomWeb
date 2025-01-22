<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPembayaran extends Model
{
    use HasFactory;

    protected $table = 'detail_pembayarans'; // If you want to specify a custom table name

    protected $fillable = [
        'id_pembayaranlaundries',
        'id_hargalaundries',
        'quantity',
        'total',
    ];

    /**
     * Define the relationship with PembayaranLaundry
     */
    public function pembayaranLaundry()
    {
        return $this->belongsTo(PembayaranLaundry::class, 'id_pembayaranlaundries','id');
    }

    /**
     * Define the relationship with HargaLaundry
     */
    public function hargaLaundry()
    {
        return $this->belongsTo(HargaLaundry::class, 'id_hargalaundries','id');
    }
}
