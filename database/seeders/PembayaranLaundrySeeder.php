<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PembayaranLaundrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pembayaranlaundries')->insert([
            [
                'id_staff' => 1, // ID staff
                'id_pelanggan' => 1, // ID pelanggan
                'id_hargalaundries' => 1, // ID harga laundry
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_staff' => 2,
                'id_pelanggan' => 2,
                'id_hargalaundries' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
         
        ]);
    }
}
