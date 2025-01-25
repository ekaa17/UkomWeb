<?php

namespace App\Models;

use App\Models\Kecamatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelurahan extends Model
{
    use HasFactory;

    

    // Kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'kode_kelurahan',
        'id_kecamatan',
        'nama_kelurahan',
    ];

    /**
     * Relasi ke model Kecamatan.
     * Satu kelurahan hanya memiliki satu kecamatan.
     */
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id');
    }
}
