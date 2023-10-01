<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Material>
 */
class MaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pdf_file_link' => fake()->url, // Generates a random URL
            'pdf_file_name' => fake()->word(),
            'subject_id' => rand(1, 10),
        ];
    }
}
