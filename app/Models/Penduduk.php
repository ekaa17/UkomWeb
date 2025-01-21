<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'penduduks';

    protected $fillable = [
        'nik',
        'nama',
        'alamat',
        'kelurahan',
        'id_staff',
    ];

    /**
     * Relasi ke model Staff.
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'id_staff', 'id');
    }
}
