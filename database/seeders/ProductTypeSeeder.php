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
        $types = [
            ['type' => 'Medical Glasses', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Sunglasses', 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'Lenses', 'created_at' => now(), 'updated_at' => now()]
        ];

        ProductType::insert($types);
    }
}
