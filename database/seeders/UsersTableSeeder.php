<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert users first (no 'status' field in users table)
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'phone' => '+8801775282986',
                'password' => Hash::make('123456789'),
                'role' => 'admin',
                'address' => 'Admin Address',
                'profile_image' => 'admin_image.png',
            ],
            [
                'name' => 'Vendor',
                'email' => 'vendor@gmail.com',
                'phone' => '+8801775282987',
                'password' => Hash::make('123456789'),
                'role' => 'vendor',
                'address' => 'Vendor Address',
                'profile_image' => 'vendor_image.png',
            ],
            [
                'name' => 'Vendor2',
                'email' => 'vendor2@gmail.com',
                'phone' => '+8801775282987',
                'password' => Hash::make('123456789'),
                'role' => 'vendor',
                'address' => 'Vendor2 Address',
                'profile_image' => 'vendor2_image.png',
            ],
            [
                'name' => 'Customer',
                'email' => 'user@gmail.com',
                'phone' => '+8801775282988',
                'password' => Hash::make('123456789'),
                'role' => 'customer',
                'address' => 'Customer Address',
                'profile_image' => 'customer_image.png',
            ],
        ]);

        // Now create vendor details in the 'vendors' table
        // Fetching user IDs that correspond to vendors
        $vendorUserIds = DB::table('users')->whereIn('email', ['vendor@gmail.com', 'vendor2@gmail.com'])->pluck('id');

        DB::table('vendors')->insert([
            [
                'user_id' => $vendorUserIds[0], // Vendor 1
                'store_name' => 'Vendor Store 1',
                'store_logo' => 'vendor_logo_1.png',
                'status' => 'approved',  // Vendor status can be 'approved', 'pending', etc.
            ],
            [
                'user_id' => $vendorUserIds[1], // Vendor 2
                'store_name' => 'Vendor Store 2',
                'store_logo' => 'vendor_logo_2.png',
                'status' => 'pending',  // Vendor status set to 'pending'
            ],
        ]);
    }
}
