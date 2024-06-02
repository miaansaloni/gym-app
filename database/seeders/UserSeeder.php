<?php

namespace Database\Seeders;

use App\Models\Slot;
use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $degree_ids = Degree::all()->pluck('id')->all();
        // $degree_ids[] = null;
        $randomNumber = fake()->numberBetween(1, 500);
        // URL dell'immagine con numero casuale
        $randomImage = 'https://source.unsplash.com/random/500x500?sig=' . $randomNumber;


        User::factory()->create([
            'name' => 'Admin',
            'surname' => 'Example',
            'username' => 'adminuser',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => Hash::make('adminpassword'),
            'profile_img' => $randomImage,
            'course_id' => null,

        ]);

        User::factory()->create([
            'name' => 'User',
            'surname' => 'Example',
            'username' => 'normaluser',
            'email' => 'user@example.com',
            'role' => 'user',
            'password' => Hash::make('userpassword'),
            'profile_img' => $randomImage,
            'course_id' => 2,
        ]);

        User::factory(10)->create();
        $course_ids = Course::all()->pluck('id')->all();

        $users = User::all()->all();
        foreach ($users as $user) {
            if ($user->role ==='user') {
                $user->courses()->attach(['status' => fake()->randomElement(['true', 'false'])]);
            }
        }
    }
}
