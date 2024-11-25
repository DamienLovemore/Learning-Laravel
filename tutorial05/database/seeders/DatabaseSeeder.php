<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'password' => 'testing123#@*'
        ]);

        User::factory()->create([
            'name' => 'Test User2',
            'email' => 'tester@gmail.com',
            'password' => 'testing321@@!'
        ]);

        User::factory()->create([
            "name" => "Admin User",
            "email" => "admin@gmail.com",
            "password" => "admin123!&*",
            "is_admin" => true
        ]);
    }
}
