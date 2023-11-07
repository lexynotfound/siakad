<?php

namespace Database\Seeders;
use App\Models\AttendenceSubjects;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendenceSubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AttendenceSubjects::factory(350)->create();
    }
}
