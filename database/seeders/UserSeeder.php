<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'raihanardila',
            'email' => 'raihanardila22@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
        ]);
    }
}
