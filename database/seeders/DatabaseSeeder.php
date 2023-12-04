<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(300)->create();

    /*  \App\Models\User::factory()->create([
            'name' => 'raihanardila',
            'email' => 'raihanardila22@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
        ]); */

        $this->call([
            UserSeeder::class,
            SubjectSeeder::class,
            ScheduleSeeder::class,
            KhsSeeder::class,
            AttendenceSubjectsSeeder::class,
            ImtSeeder::class,
        ]);
    }
}
