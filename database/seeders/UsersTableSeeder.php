<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Admin',
                'email'              => 'admin@admin.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2024-08-08 21:10:31',
                'street_address'     => '',
                'city'               => '',
                'zip_code'           => '',
                'verification_token' => '',
                'two_factor_code'    => '',
            ],
        ];

        User::insert($users);
    }
}
