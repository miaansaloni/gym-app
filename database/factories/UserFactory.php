<?php

namespace Database\Factories;

use App\Models\Slot;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $randomNumber = fake()->numberBetween(1, 500);
        $randomImage = 'https://source.unsplash.com/random/500x500?sig=' . $randomNumber;


        $course_ids = Course::all()->pluck('id')->all();
        $course_ids[] = null;
        $course_id = fake()->randomElement($course_ids);

        return [
            'name' => fake()->name(),
            'surname' => fake()->name(),
            'username' => fake()->unique()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => $course_id ? 'user' : 'admin',
            'profile_img' => $randomImage,
            'course_id' => $course_ids,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'admin',
            ];
        });
    }

    public function user()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'user',
            ];
        });
    }
}
