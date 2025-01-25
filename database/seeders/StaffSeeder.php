<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('staff')->insert([
            [
                'name' => 'Eka',
                'no_telepon' => '0898766788',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'Admin',
                'profile' => 'file.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'pak ihsan',
                'no_telepon' => '0898766788',
                'email' => 'ihsan@gmail.com',
                'password' => Hash::make('123456'),
                'role' => 'Karyawan',
                'profile' => 'file.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
