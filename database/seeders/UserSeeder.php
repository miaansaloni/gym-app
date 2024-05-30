<?php

namespace Database\Seeders;

use App\Models\User;
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


        User::factory()->admin()->create([
            'name' => 'Admin',
            'surname' => 'Example',
            'username' => 'adminuser',
            'email' => 'admin@example.com',
            'password' => Hash::make('adminpassword'),
            'profile_img' => $randomImage,
        ]);

        User::factory()->user()->create([
            'name' => 'User',
            'surname' => 'Example',
            'username' => 'normaluser',
            'email' => 'user@example.com',
            'password' => Hash::make('userpassword'),
            'profile_img' => $randomImage,
        ]);

        User::factory(10)->create();
    }
}
