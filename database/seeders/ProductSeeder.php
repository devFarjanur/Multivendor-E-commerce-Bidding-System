<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Example products data for seeding
        $products = [
            // Products for 'Electronics' category
            ['vendor_id' => 1, 'category_id' => 1, 'subcategory_id' => 1, 'name' => 'iPhone 13', 'description' => 'Apple iPhone 13 with 128GB storage', 'price' => 799.99, 'image' => 'iphone13.webp', 'bidding_end' => Carbon::now()->addDays(10), 'status' => 'active'],
            ['vendor_id' => 2, 'category_id' => 1, 'subcategory_id' => 2, 'name' => 'Dell XPS 13', 'description' => 'Dell XPS 13 Laptop with Intel i7', 'price' => 1499.99, 'image' => 'dell_xps13.webp', 'bidding_end' => Carbon::now()->addDays(5), 'status' => 'active'],
            ['vendor_id' => 3, 'category_id' => 1, 'subcategory_id' => 3, 'name' => 'Canon EOS 90D', 'description' => 'Canon EOS 90D DSLR camera', 'price' => 1299.99, 'image' => 'canon_eos90d.webp', 'bidding_end' => Carbon::now()->addDays(8), 'status' => 'active'],
            
            // Products for 'Fashion' category
            ['vendor_id' => 4, 'category_id' => 2, 'subcategory_id' => 4, 'name' => 'Men\'s T-Shirt', 'description' => 'Cotton Men\'s T-Shirt in various colors', 'price' => 19.99, 'image' => 'mens_tshirt.webp', 'bidding_end' => Carbon::now()->addDays(7), 'status' => 'active'],
            ['vendor_id' => 5, 'category_id' => 2, 'subcategory_id' => 5, 'name' => 'Women\'s Dress', 'description' => 'Elegant Women\'s Dress for evening wear', 'price' => 49.99, 'image' => 'womens_dress.webp', 'bidding_end' => Carbon::now()->addDays(12), 'status' => 'active'],
            ['vendor_id' => 6, 'category_id' => 2, 'subcategory_id' => 6, 'name' => 'Leather Wallet', 'description' => 'Genuine leather wallet for men', 'price' => 29.99, 'image' => 'leather_wallet.jpeg', 'bidding_end' => Carbon::now()->addDays(15), 'status' => 'active'],

            // Products for 'Home Appliances' category
            ['vendor_id' => 7, 'category_id' => 3, 'subcategory_id' => 7, 'name' => 'Samsung Refrigerator', 'description' => 'Samsung 350L Frost Free Refrigerator', 'price' => 799.99, 'image' => 'samsung_fridge.webp', 'bidding_end' => Carbon::now()->addDays(3), 'status' => 'active'],
            ['vendor_id' => 8, 'category_id' => 3, 'subcategory_id' => 8, 'name' => 'LG Washing Machine', 'description' => 'LG 7kg Fully Automatic Washing Machine', 'price' => 499.99, 'image' => 'lg_washing_machine.webp', 'bidding_end' => Carbon::now()->addDays(9), 'status' => 'active'],
            ['vendor_id' => 9, 'category_id' => 3, 'subcategory_id' => 9, 'name' => 'Panasonic Microwave', 'description' => 'Panasonic Microwave Oven with 23L capacity', 'price' => 119.99, 'image' => 'panasonic_microwave.webp', 'bidding_end' => Carbon::now()->addDays(14), 'status' => 'active'],

            // Products for 'Beauty & Personal Care' category
            ['vendor_id' => 10, 'category_id' => 4, 'subcategory_id' => 10, 'name' => 'Moisturizing Cream', 'description' => 'Hydrating Moisturizing Cream for dry skin', 'price' => 25.99, 'image' => 'moisturizing_cream.webp', 'bidding_end' => Carbon::now()->addDays(6), 'status' => 'active'],
            ['vendor_id' => 11, 'category_id' => 4, 'subcategory_id' => 11, 'name' => 'Hair Dryer', 'description' => 'Professional Hair Dryer with multiple heat settings', 'price' => 59.99, 'image' => 'hair_dryer.png', 'bidding_end' => Carbon::now()->addDays(13), 'status' => 'active'],
            ['vendor_id' => 12, 'category_id' => 4, 'subcategory_id' => 12, 'name' => 'Makeup Kit', 'description' => 'Complete Makeup Kit with various cosmetics', 'price' => 89.99, 'image' => 'makeup_kit.jpg', 'bidding_end' => Carbon::now()->addDays(11), 'status' => 'active'],

            // Products for 'Furniture' category
            ['vendor_id' => 13, 'category_id' => 6, 'subcategory_id' => 13, 'name' => 'Sofa Set', 'description' => 'Luxury Sofa Set for living room', 'price' => 999.99, 'image' => 'sofa_set.jpg', 'bidding_end' => Carbon::now()->addDays(4), 'status' => 'active'],
            ['vendor_id' => 14, 'category_id' => 6, 'subcategory_id' => 14, 'name' => 'Wooden Bed', 'description' => 'King-size Wooden Bed with mattress', 'price' => 499.99, 'image' => 'wooden_bed.jpg', 'bidding_end' => Carbon::now()->addDays(15), 'status' => 'active'],
            ['vendor_id' => 15, 'category_id' => 6, 'subcategory_id' => 15, 'name' => 'Office Chair', 'description' => 'Ergonomic Office Chair with adjustable features', 'price' => 149.99, 'image' => 'office_chair.webp', 'bidding_end' => Carbon::now()->addDays(10), 'status' => 'active'],

            // Additional Products
            ['vendor_id' => 1, 'category_id' => 1, 'subcategory_id' => 1, 'name' => 'Smartwatch', 'description' => 'Latest Smartwatch with health monitoring features', 'price' => 199.99, 'image' => 'smartwatch.webp', 'bidding_end' => Carbon::now()->addDays(6), 'status' => 'active'],
            ['vendor_id' => 2, 'category_id' => 1, 'subcategory_id' => 2, 'name' => 'HP Spectre x360', 'description' => 'HP Spectre x360 Convertible Laptop', 'price' => 1499.99, 'image' => 'hp_spectre.jpg', 'bidding_end' => Carbon::now()->addDays(8), 'status' => 'active'],
            ['vendor_id' => 3, 'category_id' => 1, 'subcategory_id' => 3, 'name' => 'GoPro HERO9', 'description' => 'GoPro HERO9 Black Edition for adventure recording', 'price' => 399.99, 'image' => 'gopro_hero9.webp', 'bidding_end' => Carbon::now()->addDays(9), 'status' => 'active'],
        ];

        // Insert the products into the database
        foreach ($products as $product) {
            DB::table('products')->insert([
                'vendor_id' => $product['vendor_id'],
                'category_id' => $product['category_id'],
                'subcategory_id' => $product['subcategory_id'],
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'image' => $product['image'],
                'bidding_end' => $product['bidding_end'],
                'status' => $product['status'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
