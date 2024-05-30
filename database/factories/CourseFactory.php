<?php

namespace Database\Factories;

use App\Models\Slot;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $activity_ids = Activity::all()->pluck('id')->all();
        $slot_ids = Slot::all()->pluck('id')->all();

        $randNum = fake()->randomDigit();
        $randLocation = 'Room ' . $randNum;

        return [
            'activity_id' => fake()->randomElement($activity_ids),
            'slot_id' => fake()->randomElement($slot_ids),
            'location' => $randLocation,
            // 'location' => fake()->randomElement('Cardio Room', 'Weight Room', 'Spin/Cycling Room', 'Yoga/Pilates Studio', 'Boxing/Martial Arts Room'),
        ];
    }
}
