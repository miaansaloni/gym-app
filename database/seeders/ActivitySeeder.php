<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Activity::factory()->create([
        //     'name' => 'Pilates',
        //     'description' => fake()->words(rand(4, 100), true),
        //     'img' => 'https://www.futurapilates.it/wp-content/uploads/2022/05/photo-output_1-2.jpg',
        // ]);

        Activity::factory(10)->create();
    }
}

