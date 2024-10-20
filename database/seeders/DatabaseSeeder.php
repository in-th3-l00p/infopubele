<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin user',
            'email' => 'admin@example.com',
            'role' => "admin"
        ]);

        User::factory()->create([
            'name' => 'Uat user',
            'email' => 'uat@example.com',
            'role' => "uat"
        ]);

        User::factory()->create([
            'name' => 'Operator user',
            'email' => 'operator@example.com',
            'role' => "operator"
        ]);

        User::factory()->create([
            'name' => 'Generator user',
            'email' => 'generator@example.com',
            'role' => "generator"
        ]);
    }
}
