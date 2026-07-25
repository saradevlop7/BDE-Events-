<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Student User',
        //     'email' => 'student@example.com',
        // ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Admin User',
        //     'email' => 'admin@example.com',
        //     'role' => 'admin'
        // ]);
         \App\Models\User::create([
            'name' => 'Admin User',
            'email' => 'admin1@example.com',
            'role' => 'admin',
            "password"=>Hash::make("1234567"),
         ]);
         \App\Models\User::create([
            'name' => 'User normal',
            'email' => 'user1@example.com',
            'role' => 'student',
            "password"=>Hash::make("1234567"),
         ]);
    }
}
