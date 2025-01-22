<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetailPembayaran;

class DetailPembayaranSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     *
     * @return void
     */
    public function run()
    {
        // Contoh data dummy
        $data = [
            [
                'id_pembayaranlaundries' => 1, // Ganti dengan ID pembayaranlaundries yang valid
                'id_hargalaundries' => 1, // Ganti dengan ID hargalaundries yang valid
                'quantity' => 3,
                'total' => 30000.00,
            ],
            [
                'id_pembayaranlaundries' => 1,
                'id_hargalaundries' => 2,
                'quantity' => 2,
                'total' => 50000.00,
            ],
            [
                'id_pembayaranlaundries' => 2,
                'id_hargalaundries' => 3,
                'quantity' => 5,
                'total' => 75000.00,
            ],
        ];

        // Insert data ke tabel detail_pembayarans
        foreach ($data as $item) {
            DetailPembayaran::create($item);
        }
    }
}
