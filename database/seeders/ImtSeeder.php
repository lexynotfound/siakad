<?php

namespace Database\Seeders;

use App\Models\Imt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Imt::factory()->count(350)->create();
    }
}
