<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\Slot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SlotSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Device::all() as $device)
            Slot::factory(rand(1, 5))->create(["device_id" => $device->id]);
    }
}
