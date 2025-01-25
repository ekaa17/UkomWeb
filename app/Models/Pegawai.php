<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawais';

    protected $fillable = [
        'nama',
        'alamat',
        'jenis_kelamin',
        'jabatan',
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
