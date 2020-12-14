<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
class transaksiSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::insert([
            [
                'user_id'            => 2,
                'nominal'            => 1200000,
                'jenis'              => "Mandiri Syariah",
                'status'             => 0,
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id'            => 3,
                'nominal'            => 1500000,
                'jenis'              => "BNI Syariah",
                'status'             => 1,
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'user_id'            => 3,
                'nominal'            => 2500000,
                'jenis'              => "Mandiri Syariah",
                'status'             => 0,
                'created_at' => date("Y-m-d H:i:s")
            ],
        ]);
    }
}
