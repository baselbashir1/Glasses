<?php

namespace Database\Seeders;

use App\Models\AgentCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['category' => 'VIP', 'created_at' => now(), 'updated_at' => now()],
            ['category' => 'Normal', 'created_at' => now(), 'updated_at' => now()]
        ];

        AgentCategory::insert($categories);
    }
}
