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
                'role' => 'admin',
            ]
        ]);
    }
}
