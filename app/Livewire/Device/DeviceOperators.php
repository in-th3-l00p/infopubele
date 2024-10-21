<?php

namespace App\Livewire\Device;

use App\Models\Device;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DeviceOperators extends Component
{
    use WithPagination;

    public Device $device;
    public string $user;

    public function addOperator() {
        $this->validate([
            "user" => "required|exists:users,id"
        ]);
        $user = User::findOrFail($this->user);
        $this->device->associatedUsers()->attach($user);
        $this->dispatch("saved");
        $this->dispatch('$refresh');
    }

    public function removeOperator($userId) {
        $user = User::findOrFail($userId);
        $this->device->associatedUsers()->detach($user);
        $this->dispatch("saved");
        $this->dispatch('$refresh');
    }

    public function render()
    {
        $users = $this->device->associatedUsers()->paginate(5);
        $possibleUsers = User::query()
            ->where("role", "=", "operator")
            ->where("city", "=", $this->device->city)
            ->whereNotIn("id", $users->getCollection()->pluck("id"))
            ->orderBy("name")
            ->get();
        return view('livewire.device.device-operators', [
            "users" => $users,
            "possibleUsers" => $possibleUsers
        ]);
    }
}
