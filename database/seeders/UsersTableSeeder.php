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
                'name' => 'Customer',
                'email' => 'user@gmail.com',
                'phone' => '+8801775282988',
                'password' => Hash::make('123456789'),
                'role' => 'customer',
                'address' => 'Customer Address',
                'profile_image' => 'customer_image.png',
            ],
        ]);

        $categoryIds = DB::table('categories')->pluck('id')->toArray();

        if (empty($categoryIds)) {
            $this->command->error("No categories found in the 'categories' table. Seed categories first.");
            return;
        }

        $vendorNames = [];
        for ($i = 1; $i <= 20; $i++) {
            $vendorNames[] = "Vendor " . $i;
        }

        $vendorUserIds = [];
        foreach ($vendorNames as $i => $name) {
            $userId = DB::table('users')->insertGetId([
                'name' => $name,
                'email' => strtolower(str_replace(' ', '', $name)) . "@gmail.com",
                'phone' => '+880177528' . str_pad($i + 1, 4, '0', STR_PAD_LEFT),
                'password' => Hash::make('123456789'),
                'role' => 'vendor',
                'address' => $name . ' Address',
                'profile_image' => strtolower(str_replace(' ', '_', $name)) . '_image.png',
            ]);
            $vendorUserIds[] = $userId;
        }

        // Insert vendors data for each vendor user with random category and status
        $statuses = ['active', 'pending', 'rejected']; // Randomly assign one of these statuses
        foreach ($vendorUserIds as $index => $userId) {
            DB::table('vendors')->insert([
                'user_id' => $userId,
                'category_id' => $categoryIds[array_rand($categoryIds)], // Randomly pick a category ID
                'store_name' => 'Store of ' . $vendorNames[$index], // Vendor store name
                'store_logo' => strtolower(str_replace(' ', '_', $vendorNames[$index])) . '_logo.png', // Vendor store logo
                'status' => $statuses[array_rand($statuses)], // Random status
            ]);
        }
    }
}
