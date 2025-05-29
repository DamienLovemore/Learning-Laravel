<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Business>
 */
class BusinessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //Factory usage example: \App\Models\Item::factory(10)->create();
        //You can also use database seed: php artisan make:seeder UsersTableSeeder and php artisan db:seed
        return [
            "business_name" => fake()->company(),
            "contact_email" => fake()->unique()->companyEmail()
        ];
    }
}
