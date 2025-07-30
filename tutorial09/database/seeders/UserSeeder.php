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
        User::factory()->create([
            'first_name' => 'Damien',
            'last_name' => 'Lovemore',
            'email' => 'test@example.com',
        ]);//Create a single user with some fixed fields, the others generated randomly as difined by the factory class of User.

        User::factory(2)->create();//Creates 2 random users
    }
}
