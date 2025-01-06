<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
<<<<<<< HEAD
        $this->call(CategoriesTableSeeder::class);
=======
>>>>>>> edaa50eb216b4ea1d8ac89f28f90a7083c62b570
        $this->call(SubcategorySeeder::class);
        $this->call(ProductSeeder::class);
        \App\Models\User::factory(0)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
