<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'video_title' => fake()->sentence(3), // Generates a random sentence
            'video_url' => fake()->url,            // Generates a random URL
            'subject_id' => rand(1, 10),
            'department_id' => rand(1, 10),
            'category_id' => rand(1, 10),
            'professor_id' => rand(1, 10),
        ];
    }
}
