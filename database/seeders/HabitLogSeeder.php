<?php

namespace Database\Seeders;

use App\Models\Habit;
use App\Models\HabitLog;
use Illuminate\Database\Seeder;

class HabitLogSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Habit::all() as $habit) {
            foreach (range(1, 10) as $day) {
                HabitLog::firstOrCreate(
                    [
                        'habit_id' => $habit->id,
                        'completed_at' => now()->subDays($day)->toDateString(),
                    ],
                    [
                        'user_id' => $habit->user_id,
                    ]
                );
            }
        }
    }
}
