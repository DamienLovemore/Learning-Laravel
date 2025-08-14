<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Criação de usuários
        User::factory()->create([
            'name'      => 'Damien Lovemore',
            'email'     => 'matheusoaresmartins2020@gmail.com',
            'password'  => Hash::make('123456a!')
        ]);
        User::factory(2)->create();
    }
}
