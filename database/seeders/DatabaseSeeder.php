<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{User};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminCheck = User::where('email', 'admin@gmail.com')->first();
        if (!$adminCheck) {
            User::factory()->create([
                'first_name' => 'Admin',
                'last_name' => 'chatbot',
                'role'      => 0,
                'email'     => 'admin@gmail.com',
                'password'  => bcrypt('admin@gmail.com'),
            ]);
        }
    }
}
