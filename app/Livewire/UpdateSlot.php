<?php

namespace App\Livewire;

use App\Models\Device;
use App\Models\Slot;
use Livewire\Component;

class UpdateSlot extends Component
{
    public Slot $slot;
    public string $name;
    public float $capacity;

    public function mount() {
        $this->name = $this->slot->name;
        $this->capacity = $this->slot->max_volume;
    }

    public function render()
    {
        return view('livewire.update-slot');
    }

    public function updateSlot() {
        $this->validate([
            "name" => "required|min:3|max:255|alpha",
            "capacity" => "required|numeric|min:0.1|max:100"
        ], [
            "name.required" => __("Name is required"),
            "name.min" => __("Name must have at least 3 characters"),
            "name.max" => __("Name must have at most 255 characters"),
            "name.alpha" => __("Name must contain only letters"),
            "capacity.required" => __("Capacity is required"),
            "capacity.numeric" => __("Capacity must be a number"),
            "capacity.min" => __("Capacity must be at least 0.1"),
            "capacity.max" => __("Capacity must be at most 100")
        ]);

        $this->slot->update([
            "name" => $this->name,
            "max_volume" => $this->capacity
        ]);
    }
}
