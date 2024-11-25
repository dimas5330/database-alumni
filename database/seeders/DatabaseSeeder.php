<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(20)->create();

        \App\Models\User::factory()->create([
            'name' => 'Dimas',
            'email' => 'dimas@test.com',
            'phone' => '081234567890',
            'password' => Hash::make('rahasia123'),
            'role' => 'admin',
        ]);
    }
}
