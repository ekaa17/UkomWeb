<?php

namespace Database\Seeders;

use App\Models\Penduduk;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data penduduk contoh
        $penduduk = [
            [
                'nik' => '1234567890123456',
                'nama' => 'Eka Suryana',
                'alamat' => 'Jl. Merdeka No. 10',
                'kelurahan' => 'Cempaka Putih',
                'id_staff' => 1, // ID staff yang bertanggung jawab
            ],
            [
                'nik' => '2345678901234567',
                'nama' => 'Mifta Rahmawati',
                'alamat' => 'Jl. Mawar No. 15',
                'kelurahan' => 'Kebayoran Lama',
                'id_staff' => 2, // ID staff yang bertanggung jawab
            ],
            [
                'nik' => '3456789012345678',
                'nama' => 'Agung Pratama',
                'alamat' => 'Jl. Melati No. 22',
                'kelurahan' => 'Pondok Indah',
                'id_staff' => 1, // ID staff yang bertanggung jawab
            ],
        ];

        // Masukkan data ke tabel penduduk
        foreach ($penduduk as $data) {
            Penduduk::create($data);
        }
    }
}
