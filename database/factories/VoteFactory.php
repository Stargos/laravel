<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\votes>
 */
class VoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'selection_id' => fake()->numberBetween(1, 17),
            'user_id' => fake()->numberBetween(1, 10),
            'VOTE_DATE' => fake()->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
