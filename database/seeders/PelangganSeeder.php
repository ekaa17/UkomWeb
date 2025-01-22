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
                'nama' => 'John Doe',
                'alamat' => '123 Main Street',
                'no_telepon' => '08123456789',
            ]);
    
            Pelanggan::create([
                'nama' => 'Jane Smith',
                'alamat' => '456 Another Street',
                'no_telepon' => '08987654321',
            ]);
        }
    
}
