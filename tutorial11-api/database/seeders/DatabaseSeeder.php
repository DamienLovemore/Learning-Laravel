<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Ticket;
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

        $users = User::factory(10)->create();

        User::factory()->create([
            'name' => 'Matheus Soares Martins',
            'email' => 'matheusoaresmartins2020@gmail.com',
            'password' => Hash::make("abcdef21")
        ]);

        Ticket::factory(100)
            ->recycle($users)//Recycle assigns randomly from the variable
            ->create();
    }
}
