<?php

namespace Database\Factories;

use App\Models\Device;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slot>
 */
class SlotFactory extends Factory
{
    public function definition(): array
    {
        $max_volume = fake()->randomFloat(2, 0, 100);
        return [
            "name" => fake()->name(),
            "volume" => fake()->randomFloat(2, 0, $max_volume),
            "max_volume" => $max_volume,
            "device_id" => Device::query()->inRandomOrder()->first()->id,
            "owner_id" => User::query()
                ->where("role", "=", "admin")
                ->inRandomOrder()
                ->first()->id
        ];
    }
}
