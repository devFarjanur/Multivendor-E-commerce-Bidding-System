<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Example subcategories data for seeding
        $subcategories = [
            // Subcategories for 'Electronics'
            ['vendor_id' => 1, 'category_id' => 1, 'name' => 'Mobile Phones', 'image' => 'mobile_phones.jpg', 'status' => 'active'],
            ['vendor_id' => 2, 'category_id' => 1, 'name' => 'Laptops', 'image' => 'laptops.jpg', 'status' => 'active'],
            ['vendor_id' => 3, 'category_id' => 1, 'name' => 'Cameras', 'image' => 'cameras.jpg', 'status' => 'active'],

            // Subcategories for 'Fashion'
            ['vendor_id' => 4, 'category_id' => 2, 'name' => 'Men\'s Clothing', 'image' => 'mens_clothing.jpg', 'status' => 'active'],
            ['vendor_id' => 5, 'category_id' => 2, 'name' => 'Women\'s Clothing', 'image' => 'womens_clothing.jpg', 'status' => 'active'],
            ['vendor_id' => 6, 'category_id' => 2, 'name' => 'Accessories', 'image' => 'accessories.jpg', 'status' => 'active'],

            // Subcategories for 'Home Appliances'
            ['vendor_id' => 7, 'category_id' => 3, 'name' => 'Refrigerators', 'image' => 'refrigerators.jpg', 'status' => 'active'],
            ['vendor_id' => 8, 'category_id' => 3, 'name' => 'Washing Machines', 'image' => 'washing_machines.jpg', 'status' => 'active'],
            ['vendor_id' => 9, 'category_id' => 3, 'name' => 'Microwaves', 'image' => 'microwaves.jpg', 'status' => 'active'],

            // Subcategories for 'Beauty & Personal Care'
            ['vendor_id' => 10, 'category_id' => 4, 'name' => 'Skincare', 'image' => 'skincare.jpg', 'status' => 'active'],
            ['vendor_id' => 11, 'category_id' => 4, 'name' => 'Hair Care', 'image' => 'hair_care.jpg', 'status' => 'active'],
            ['vendor_id' => 12, 'category_id' => 4, 'name' => 'Makeup', 'image' => 'makeup.jpg', 'status' => 'active'],

            // Subcategories for 'Furniture'
            ['vendor_id' => 13, 'category_id' => 6, 'name' => 'Living Room Furniture', 'image' => 'living_room_furniture.jpg', 'status' => 'active'],
            ['vendor_id' => 14, 'category_id' => 6, 'name' => 'Bedroom Furniture', 'image' => 'bedroom_furniture.jpg', 'status' => 'active'],
            ['vendor_id' => 15, 'category_id' => 6, 'name' => 'Office Furniture', 'image' => 'office_furniture.jpg', 'status' => 'active'],
        ];

        // Insert the subcategories into the database
        foreach ($subcategories as $subcategory) {
            DB::table('subcategories')->insert([
                'vendor_id' => $subcategory['vendor_id'],
                'category_id' => $subcategory['category_id'],
                'name' => $subcategory['name'],
                'image' => $subcategory['image'],
                'status' => $subcategory['status'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
