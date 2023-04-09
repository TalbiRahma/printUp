<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('users')->insert(
            [
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'email' => 'printUp.laravel@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('123456789'),
                'phone' => '+216 22776933',
                'photo' => null,
                'email_verified_at' => '2023-04-06 15:10:00',
            ]
        );
    }
}
