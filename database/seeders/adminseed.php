<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class adminseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name'            => 'admin',
                'email'           => 'admin@gmail.com',
                'email_verified_at' => '2019-05-14 04:10:10',
                'password'        => bcrypt("admin"),
                'no_telepon' => '082283777098',
                'alamat' => 'Jalan Bersama No. 114, Kelurahan Tembilahan, Kec. Tembilahan Hulu, Kabupaten Indragiri Hilir, Provinsi Riau',
                'role' => 'admin',
            ],
            [
                'name'            => 'kamil',
                'email'           => 'kamil@gmail.com',
                'email_verified_at' => '2019-05-14 04:10:10',
                'password'        => bcrypt("password"),
                'no_telepon' => '082283777098',
                'alamat' => 'Jalan Bersama No. 114, Kelurahan Tembilahan, Kec. Tembilahan Hulu, Kabupaten Indragiri Hilir, Provinsi Riau',
                'role' => 'user',
            ],
            [
                'name'            => 'guntur',
                'email'           => 'guntur@gmail.com',
                'email_verified_at' => '2019-05-14 04:10:10',
                'password'        => bcrypt("password"),
                'no_telepon' => '082283777098',
                'alamat' => 'Jalan Bersama No. 114, Kelurahan Tembilahan, Kec. Tembilahan Hulu, Kabupaten Indragiri Hilir, Provinsi Riau',
                'role' => 'user',
            ],
            [
                'name'            => 'reyhan',
                'email'           => 'reyhan@gmail.com',
                'email_verified_at' => '2019-05-14 04:10:10',
                'password'        => bcrypt("password"),
                'no_telepon' => '082283777098',
                'alamat' => 'Jalan Bersama No. 114, Kelurahan Tembilahan, Kec. Tembilahan Hulu, Kabupaten Indragiri Hilir, Provinsi Riau',
                'role' => 'user',
            ]
        ]);
    }
}
