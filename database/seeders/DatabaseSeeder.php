<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Hargalaundry;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
     $this->call([
        MahasiswaSeeder ::class,
        StaffSeeder ::class,
        PendudukSeeder ::class,
        PelangganSeeder ::class,
        HargalaundrySeeder ::class,
        PembayaranLaundrySeeder ::class,
        DetailPembayaranSeeder::class,
     ]);    
    }
}
