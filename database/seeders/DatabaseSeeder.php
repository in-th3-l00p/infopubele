<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\City;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CitySeeder::class);

         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);

        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Uat User',
            'email' => 'uat@example.com',
            'role' => 'uat',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Operator User',
            'email' => 'operator@example.com',
            'role' => 'operator',
        ]);
    }
}
