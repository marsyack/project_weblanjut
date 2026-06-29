<?php

namespace Database\Factories;

use App\Models\feed;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<feed>
 */
class FeedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'status' => $this->faker->paragraph(3),
            'like' => $this->faker->numberBetween(5, 100) * 100,
            'created_at' => $this->faker->dateTimeBetween('-1 months', 'now'),
        ];
    }
}
