<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PelangganSeeder extends Seeder
{
   
        public function run()
        {
          
            Pelanggan::create([
                'nama' => 'Seyla',
                'alamat' => 'Cilegon',
                'no_telepon' => '08123456789',
            ]);
    
            Pelanggan::create([
                'nama' => 'Tasya',
                'alamat' => 'Serang',
                'no_telepon' => '08987654321',
            ]);

            Pelanggan::create([
                'nama' => 'YB',
                'alamat' => 'Jakarta',
                'no_telepon' => '08987654321',
            ]);
        }
    
}
