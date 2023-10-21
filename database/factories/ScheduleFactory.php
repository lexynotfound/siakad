<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //membuat sebuah data fake jadwal kuliah
            'student_id' => 301,
            'subject_id' => 1,
            'schedule_date' => fake()->dateTime(),
            'schedule_type' => 'online',
        ];
    }
}
