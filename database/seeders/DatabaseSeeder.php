<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(5)->create();

         Product::create([
                'name' => 'Iphone',
                'description' => 'Newest technology from Apple just came out this weekend',
                'price' => '999.99',
                'categories' => 'apple, phone',
                'stock_quantity' => '10'
         ]);

         Product::create([
                'name' => 'MacBook',
                'description' => 'Newest technology from Apple just came out this weekend, so hard to get',
                'price' => '2000.00',
                'categories' => 'apple, mac',
                'stock_quantity' => '5'
         ]);

         Product::create([
                'name' => 'Monitor',
                'description' => 'SAMSUNG 22 inch Full HD LED Backlit VA Panel',
                'price' => '500.00',
                'categories' => 'samsung, tv, monitor',
                'stock_quantity' => '10'
         ]);
         Product::create([
                'name' => 'Printer.00',
                'description' => 'HP DeskJet 2331 Multi-function Color Inkjet Printer with Scanner and Copier , Compact Size, Reliable, Easy Set-Up Through HP Smart App On Your PC Connected Through USB, Ideal for Home',
                'price' => '400',
                'categories' => 'hp, printer',
                'stock_quantity' => '5'
         ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
