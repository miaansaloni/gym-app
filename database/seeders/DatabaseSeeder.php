<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $randomNumber = fake()->numberBetween(1, 500);
        $profileImageUrl = 'https://source.unsplash.com/random/500x500?sig=' . $randomNumber;

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@example.com',
            'profile_image' => $profileImageUrl,
            'role' => 'user',
            'gender' => 'male',
            'telephone' => '123 456789',
            'course' => null,
        ]);
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'profile_image' => $profileImageUrl,
            'role' => 'admin',
            'gender' => 'female',
            'telephone' => '123 456789',
            'course' => null,
        ]);

        $this->call([
            ActivitySeeder::class, 
            SlotSeeder::class, 
            CourseSeeder::class, 
        ]);
    }
}
