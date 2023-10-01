<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name, // Generates a random name
            'email' => fake()->unique()->Email(), // Generates a unique email
            'admin_id' => fake()->unique()->userName, // Generates a unique username
            'password' => bcrypt('password'), // You may want to generate a more secure password
            'gender' => fake()->randomElement(['Male', 'Female']),
            'rank' => fake()->randomElement(['user', 'admin']),
            'super_user' => fake()->randomElement(['Yes', 'No']),
        ];
    }
}
