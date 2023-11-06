<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Khs>
 */
class KhsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'subject_id' => \App\Models\Subject::factory(),
            'student_id' => \App\Models\User::factory(),
            'nilai' => $this->faker->randomElement(['A','B','C','D','E']),
            'grade' => $this->faker->randomElement(['A','B','C','D','E']),
            'keterangan' => $this->faker->randomElement(['Lulus','Tidak Lulus']),
            'academic_year' => $this->faker->randomElement(['2021/2022','2022/2023','2023/2024','2024/2025']),
            'semester' => $this->faker->randomElement(['Ganjil','Genap']),
            'created_by' => $this->faker->randomElement(['1','2','3']),
            'updated_by' => $this->faker->randomElement(['1','2','3']),
        ];
    }
}
