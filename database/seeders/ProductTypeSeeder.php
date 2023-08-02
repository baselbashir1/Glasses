<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductType::create([
            'type' => 'Medical Glasses',
            'created_at' => now()
        ]);
        ProductType::create([
            'type' => 'Sunglasses',
            'created_at' => now()
        ]);
        ProductType::create([
            'type' => 'Lenses',
            'created_at' => now()
        ]);
    }
}
