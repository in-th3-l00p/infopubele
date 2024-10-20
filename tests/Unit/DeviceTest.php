<?php

namespace Tests\Unit\Models;

use App\Models\Device;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class DeviceTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_requires_unique_name_and_series() {
        $this->seed(DatabaseSeeder::class);
        $device = Device::factory()->create([
            'name' => 'Device 1',
            'series' => '123456',
        ]);

        $this->assertDatabaseHas('devices', [
            'name' => 'Device 1',
            'series' => '123456'
        ]);

        $this->expectException(UniqueConstraintViolationException::class);

        Device::factory()->create([
            'name' => 'Device 1',
            'series' => '123456'
        ]);
    }

    #[Test]
    public function it_has_many_associated_users()
    {
        $user = User::factory()->create();
        $device = Device::factory()->create();
        $user->update([
            'device_id' => $device->id,
        ]);

        $this->assertTrue($device->associatedUser->contains($user));
    }

    #[Test]
    public function it_belongs_to_an_owner()
    {
        $owner = User::factory()->create();
        $device = Device::factory()->create(['owner_id' => $owner->id]);

        $this->assertEquals($owner->id, $device->owner->id);
    }
}
