<?php

namespace Database\Factories;

use App\Models\Podcast;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Episode>
 */
class EpisodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'podcast_id' => Podcast::factory(),
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(2),
            'duree' => fake()->numberBetween(0,3000),
            'audio_file' => fake()->name(),
        ];
    }
}
