<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Course::factory(6)->create();
        Course::create([
            'location' => 'Room 3',
            'year' => '2024',
            'activity_id' => 1,
            'slot_id' => 1,
        ]);
        Course::create([
            'location' => 'Room 2',
            'year' => '2024',
            'activity_id' => 2,
            'slot_id' => 2,
        ]);
        Course::create([
            'location' => 'Room 2',
            'year' => '2024',
            'activity_id' => 1,
            'slot_id' => 3,
        ]);
    }
}
