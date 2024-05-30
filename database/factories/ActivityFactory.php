<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $randomNumber = fake()->numberBetween(1, 500);
        $randomImage = 'https://source.unsplash.com/random/500x500?sig=' . $randomNumber;

        return [
            'name' => fake()->sentence(3),
            'description' => fake()->words(rand(4, 10), true),
            'img' => $randomImage,
        ];
    }
}
