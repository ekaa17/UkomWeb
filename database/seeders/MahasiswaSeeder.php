<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::create([
            'email' => 'admin@gmail.com',
            'nama' => 'eka',
            'nim' => '21041011',
            'jurusan' => 'Teknik Informatika',
            'alamat' => 'Link.Warungkara',
        ]);

        
    }
}
