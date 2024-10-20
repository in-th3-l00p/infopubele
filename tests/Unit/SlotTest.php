<?php

namespace Tests\Unit\Models;

use App\Models\Slot;
use App\Models\Device;
use App\Models\User;
use Database\Seeders\DeviceSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class SlotTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_belongs_to_a_device()
    {
        $this->seed(UserSeeder::class);
        $this->seed(DeviceSeeder::class);
        $device = Device::query()->first();
        $slot = Slot::factory()->create(['device_id' => $device->id]);

        $this->assertEquals($device->id, $slot->device->id);
    }

    #[Test]
    public function it_belongs_to_an_owner()
    {
        $this->seed(UserSeeder::class);
        $this->seed(DeviceSeeder::class);
        $owner = User::query()->where("role", "=", "admin")->first();
        $slot = Slot::factory()->create(['owner_id' => $owner->id]);

        $this->assertEquals($owner->id, $slot->owner->id);
    }
}
