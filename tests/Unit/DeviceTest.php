<?php

namespace Tests\Unit\Models;

use App\Models\Device;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeviceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_many_associated_users()
    {
        $user = User::factory()->create();
        $device = Device::factory()->create();
        $user->update([
            'device_id' => $device->id,
        ]);

        $this->assertTrue($device->associatedUser->contains($user));
    }

    /** @test */
    public function it_belongs_to_an_owner()
    {
        $owner = User::factory()->create();
        $device = Device::factory()->create(['owner_id' => $owner->id]);

        $this->assertEquals($owner->id, $device->owner->id);
    }
}
