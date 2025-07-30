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
        //Now we can run all the seeders with php artisan migrate:fresh --seed or,
        //run them individually with php artisan db:seed --class=JobSeeder for example.
        $this->call(UserSeeder::class);
        $this->call(JobSeeder::class);
    }
}
