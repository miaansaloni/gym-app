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

        $randomNumber = fake()->numberBetween(1, 500);
        $activityImg = 'https://source.unsplash.com/random/500x500?sig=' . $randomNumber;

        // Activity::factory(6)->create();
        Activity::create([
            'name' => 'Pilates',
            'description' => "Discover the transformative power of Pilates with our comprehensive course designed to enhance strength, flexibility, and overall well-being. Led by experienced instructors, this dynamic program focuses on core stability, proper alignment, and controlled movements to improve posture, increase muscle tone, and promote relaxation. Whether you're a beginner or an advanced practitioner, our Pilates course offers a supportive environment to explore and deepen your practice, helping you achieve greater balance, coordination, and body awareness.",
            'image' => $activityImg,
        ]);
        Activity::create([
            'name' => 'High Intensity Interval Training (HIIT)',
            'description' => "Elevate your fitness routine with our exhilarating HIIT class, designed to maximize calorie burn and boost cardiovascular endurance. Led by expert trainers, this high-energy workout alternates between intense bursts of activity and short recovery periods, pushing your limits and accelerating your results. Through a combination of cardio and strength exercises, you'll challenge your body in new ways, sculpting lean muscle, improving agility, and increasing metabolic rate. Suitable for all fitness levels, our HIIT class promises to ignite your metabolism, increase energy levels, and leave you feeling stronger, fitter, and more empowered than ever before.",
            'image' => $activityImg,
        ]);
    }
}
