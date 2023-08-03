<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'brand' => 'Warby Parker',
            'product_type' => 2,
            'image' => null,
            'color' => 'Black',
            'price' => 150,
        ]);
    }
}
