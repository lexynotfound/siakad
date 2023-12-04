<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Imt>
 */
class ImtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'phone' => $this->faker->unique()->numerify('#############'), // Generates a unique numeric string of 8 digits
            'tinggi_badan' => $this ->faker->numberBetween(150, 200), // Random height between 150cm and 200cm
            'berat_badan' => $this->faker->numberBetween(40, 120), // Random weight between 40kg and 120kg
            'status' => $this->faker->randomElement(['Sangat Kurus', 'Kurus', 'Normal', 'Gemuk', 'Obesitas']),
        ];
    }
}
