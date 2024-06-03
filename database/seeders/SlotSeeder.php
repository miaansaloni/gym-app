<?php

namespace Database\Seeders;

use App\Models\Slot;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Slot::factory(16)->create();
        Slot::create([
            'day' => 'Monday',
            'start_hour' => '09:00',
            'end_hour' => '10:30',
        ]);
        Slot::create([
            'day' => 'Monday',
            'start_hour' => '15:30',
            'end_hour' => '17:30',
        ]);
        Slot::create([
            'day' => 'Wednesday',
            'start_hour' => '12:00',
            'end_hour' => '14:00',
        ]);
        Slot::create([
            'day' => 'Saturday',
            'start_hour' => '14:00',
            'end_hour' => '15:30',
        ]);
    }
}
