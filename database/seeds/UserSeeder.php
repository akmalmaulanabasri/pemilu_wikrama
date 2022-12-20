<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\User;

User::create(['name' => 'AdminMPR', 'email' => 'adminmpr@gmail.com', 'password' => bcrypt('mprbahagia2022'), 'is_admin' => 1]);

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    }
}
