<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hargalaundry extends Model
{
    use HasFactory;

    protected $table = 'hargalaundries';

    protected $fillable = [
        'jenis_layanan',
        'harga',
        'unit',
    ];
}
