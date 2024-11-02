<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'phone' => '+8801775282986',
                'password' => Hash::make('123456789'),
                'role' => 'admin',
            ],
            [
                'name' => 'Vendor',
                'email' => 'vendor@gmail.com',
                'phone' => '+8801775282987',
                'password' => Hash::make('123456789'),
                'role' => 'vendor',
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'phone' => '+8801775282988',
                'password' => Hash::make('123456789'),
                'role' => 'customer',
            ],
        ]);
    }
}