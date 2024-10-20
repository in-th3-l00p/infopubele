<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Device>
 */
class DeviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->city(),
            "series" => $this->faker->unique()->word(),
            "city" => $this->faker->randomElement(config("cities")),
            "latitude" => $this->faker->latitude(),
            "longitude" => $this->faker->longitude(),
            "owner_id" => User::query()
                ->where("role", "=", "admin")
                ->inRandomOrder()->first()->id,
        ];
    }
}
