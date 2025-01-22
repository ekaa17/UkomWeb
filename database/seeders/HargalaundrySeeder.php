<?php

namespace Database\Seeders;

use App\Models\Hargalaundry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HargalaundrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hargalaundry::create([
            'berat' => '1',
            'harga' => '50000.00',
        ]);
    }
}
