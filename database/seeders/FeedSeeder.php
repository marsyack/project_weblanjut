<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Feed;

class FeedSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            Feed::create([
                'title' => fake()->sentence(),
                'statusFeed' => fake()->paragraph(),
                'likeFeed' => fake()->numberBetween(0, 5000),
            ]);
        }
    }
}