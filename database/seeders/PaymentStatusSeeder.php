<?php

namespace Database\Seeders;

use App\Models\PaymentStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['status' => 'Paid', 'created_at' => now(), 'updated_at' => now()],
            ['status' => 'PartiallyPaid', 'created_at' => now(), 'updated_at' => now()],
            ['status' => 'UnPaid', 'created_at' => now(), 'updated_at' => now()]
        ];

        PaymentStatus::insert($statuses);
    }
}
