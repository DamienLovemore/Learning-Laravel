<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Criação de usuários
        $this->call(UserSeeder::class);

        //Criação de empregos
        $this->call(JobSeeder::class);
    }
}
