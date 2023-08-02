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
        AgentCategory::create([
            'category' => 'VIP',
            'created_at' => now()
        ]);
        AgentCategory::create([
            'category' => 'Normal',
            'created_at' => now()
        ]);
    }
}
