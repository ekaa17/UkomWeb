<?php

namespace Database\Seeders;

use App\Models\Hargalaundry;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HargalaundrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hargalaundries')->insert([
            [
                'jenis_layanan' => 'Cuci Kering',
                'harga' => 5000.00,
                'unit' => 'Kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_layanan' => 'Cuci Setrika',
                'harga' => 8000.00,
                'unit' => 'Kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_layanan' => 'Cuci Express',
                'harga' => 15000.00,
                'unit' => 'Kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_layanan' => 'Cuci Karpet',
                'harga' => 25000.00,
                'unit' => 'Meter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
