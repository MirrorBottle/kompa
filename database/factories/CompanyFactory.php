<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'abbreviation' => fake()->companySuffix(),
            'email' => fake()->unique()->companyEmail(),
            'contact' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'about' => fake()->realText(),
        ];
    }
}
