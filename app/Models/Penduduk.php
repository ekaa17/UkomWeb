<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;


    protected $fillable = [
        'nik',
        'nama',
        'alamat',
        'kelurahan',
        'id_staff',
        'id_kecamatan',
        'id_kelurahan',
    ];

    /**
     * Relasi ke model Staff.
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'id_staff', 'id');
    }

    public function kecamatan()
    {
        return $this->belongsTo(kecamatan::class, 'id_kecamatan', 'id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(kelurahan::class, 'id_kelurahan', 'id');
    }
}
