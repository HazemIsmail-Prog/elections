<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voter>
 */
class VoterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'address' => fake()->name(),
            'letter' => fake()->name(),
            'gender' => fake()->numberBetween(0, 1),
            'provider_id' => fake()->numberBetween(1, 20),
            'section_id' => fake()->numberBetween(1, 140),
            // 'vote_status' => fake()->numberBetween(0, 1),
        ];
    }
}
