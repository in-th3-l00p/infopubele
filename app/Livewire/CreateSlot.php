<?php

namespace App\Livewire;

use App\Models\Device;
use App\Models\Slot;
use Livewire\Component;

class CreateSlot extends Component
{
    public Device $device;
    public string $name;
    public float $capacity;

    public function render()
    {
        return view('livewire.create-slot');
    }

    public function createSlot() {
        $this->validate([
            "name" => "required|min:3|max:255|alpha",
            "capacity" => "required|numeric|min:1|max:1100"
        ], [
            "name.required" => __("Name is required"),
            "name.min" => __("Name must have at least 3 characters"),
            "name.max" => __("Name must have at most 255 characters"),
            "name.alpha" => __("Name must contain only letters"),
            "capacity.required" => __("Capacity is required"),
            "capacity.numeric" => __("Capacity must be a number"),
            "capacity.min" => __("Capacity must be at least 1"),
            "capacity.max" => __("Capacity must be at most 1100")
        ]);

        $slot = Slot::create([
            "name" => $this->name,
            "max_volume" => $this->capacity,
            "volume" => 0,
            "device_id" => $this->device->id,
            "order" => $this->device->slots()->count()
        ]);

        return redirect()->route("slots.show", [
            "device" => $this->device,
            "slot" => $slot
        ]);
    }
}
