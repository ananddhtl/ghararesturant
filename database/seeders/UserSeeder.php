<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => Str::random(10),
                'email' => 'admin@gmail.com',
                'address' => 'Headquaters',
                'phone' => '9779806630977',
                'role' => '1',
                'password' => Hash::make('123456789')
            ],
            [
                'name' => Str::random(10),
                'email' => 'staff@gmail.com',
                'address' => 'Headquaters',
                'phone' => '9779806630977',
                'role' => '2',
                'password' => Hash::make('123456789')
            ],
            [
                'name' => Str::random(10),
                'email' => 'user@gmail.com',
                'address' => 'Home',
                'phone' => '9779806630977',
                'role' => '0',
                'password' => Hash::make('123456789')
            ]
        ];
        User::insert($user);
    }
}
