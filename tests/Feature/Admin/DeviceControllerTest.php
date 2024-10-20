<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\Device;
use App\Models\User;
use Database\Seeders\DeviceSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class DeviceControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed(UserSeeder::class);
        $this->seed(DeviceSeeder::class);
    }

    #[Test]
    public function only_admin_can_access_index()
    {
        $admin = User::where('role', 'admin')->first();
        $user = User::where('role', '!=', 'admin')->first();

        $this->actingAs($admin)->get(route('admin.devices.index'))->assertStatus(200);
        $this->actingAs($user)->get(route('admin.devices.index'))->assertStatus(403);
    }

    #[Test]
    public function only_admin_can_access_create()
    {
        $admin = User::where('role', 'admin')->first();
        $user = User::where('role', '!=', 'admin')->first();

        $this->actingAs($admin)->get(route('admin.devices.create'))->assertStatus(200);
        $this->actingAs($user)->get(route('admin.devices.create'))->assertStatus(403);
    }

    #[Test]
    public function only_admin_can_access_show()
    {
        $admin = User::where('role', 'admin')->first();
        $user = User::where('role', '!=', 'admin')->first();
        $device = Device::first();

        $this->actingAs($admin)->get(route('admin.devices.show', $device))->assertStatus(200);
        $this->actingAs($user)->get(route('admin.devices.show', $device))->assertStatus(403);
    }

    #[Test]
    public function only_admin_can_destroy_device()
    {
        $admin = User::where('role', 'admin')->first();
        $user = User::where('role', '=', 'user')->first();
        $device = Device::first();

        $this
            ->actingAs($admin)
            ->delete(route('admin.devices.destroy', $device))
            ->assertRedirect(route('admin.devices.index'));
        $this->assertDatabaseMissing('devices', ['id' => $device->id]);

        $device = Device::factory()->create();
        $this
            ->actingAs($user)
            ->delete(route('admin.devices.destroy', $device))
            ->assertStatus(403);
        $this->assertDatabaseHas('devices', ['id' => $device->id]);
    }
}
