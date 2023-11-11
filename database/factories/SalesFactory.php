<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;
use App\Models\Customer;
use App\Models\User;
use App\Models\Salary;




/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sales>
 */
class SalesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => Company::all()->random()->id,
            // $user = ,
            'user_id' => fake()->randomElement(User::where('role', 5)->pluck('id')),
            'customer_id' => Customer::all()->random()->id,
            'salary_id' => null,
            'sale_date' => now(),
            'sale_amount' => fake()->numberBetween(1, 500),
        ];
    }
}
