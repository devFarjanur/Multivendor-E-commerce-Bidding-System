<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Electronics', 'image' => 'electronics.jpg', 'status' => 'active'],
            ['name' => 'Fashion', 'image' => 'fashion.jpg', 'status' => 'active'],
            ['name' => 'Home Appliances', 'image' => 'home_appliances.jpg', 'status' => 'active'],
            ['name' => 'Beauty & Personal Care', 'image' => 'beauty_care.jpg', 'status' => 'active'],
            ['name' => 'Groceries', 'image' => 'groceries.jpg', 'status' => 'active'],
            ['name' => 'Furniture', 'image' => 'furniture.jpg', 'status' => 'active'],
            ['name' => 'Health & Wellness', 'image' => 'health_wellness.jpg', 'status' => 'active'],
            ['name' => 'Toys & Games', 'image' => 'toys_games.jpg', 'status' => 'active'],
            ['name' => 'Books & Stationery', 'image' => 'books_stationery.jpg', 'status' => 'active'],
            ['name' => 'Mobile Phones & Accessories', 'image' => 'mobile_phones.jpg', 'status' => 'active'],
            ['name' => 'Shoes & Bags', 'image' => 'shoes_bags.jpg', 'status' => 'active'],
            ['name' => 'Jewelry', 'image' => 'jewelry.jpg', 'status' => 'active'],
            ['name' => 'Sports & Fitness', 'image' => 'sports_fitness.jpg', 'status' => 'active'],
            ['name' => 'Automotive', 'image' => 'automotive.jpg', 'status' => 'active'],
            ['name' => 'Pet Supplies', 'image' => 'pet_supplies.jpg', 'status' => 'active'],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'image' => $category['image'],
                'status' => $category['status'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
