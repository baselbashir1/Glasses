<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Basel Bashir',
            'phone' => '00963937031486',
            'email' => 'baselbashir@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'user_category' => 1,
            'created_at' => now()
        ]);
    }
}
