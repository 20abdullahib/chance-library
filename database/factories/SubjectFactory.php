<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subject_name' => fake()->sentence(2), // Generates a random sentence
            'description' => fake()->paragraph,     // Generates a random paragraph
            'academic_subject_code' => fake()->unique()->word, // Generates a unique word
            'department_id' =>rand(1,10),
            'category_id' => rand(1, 10),
            'professor_id' => rand(1, 10),
        ];
    }
}
