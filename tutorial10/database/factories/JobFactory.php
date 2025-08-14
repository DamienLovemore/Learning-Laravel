<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "employer_id"   => Employer::factory(),
            "title"         => fake()->jobTitle,
            "salary"        => "$" . number_format(fake()->randomFloat(2, 20000, 500000), 2),
            "location"      => "Remote",
            "schedule"      => "Full Time",
            "url"           => fake()->url(),
            "featured"      => false
        ];
    }
}
