<?php

namespace App\Livewire;

use App\Models\Device;
use App\Models\Slot;
use Livewire\Component;

class UpdateSlot extends Component
{
    public Device $device;
    public Slot $slot;
    public string $name;
    public float $capacity;
    public bool $updated = false;

    public function mount() {
        $this->name = $this->slot->name;
        $this->capacity = $this->slot->max_volume;
        $this->device = $this->slot->device()->first();
    }

    public function render()
    {
        return view('livewire.update-slot');
    }

    public function updateSlot()
    {
        $this->validate([
            "name" => "required|min:3|max:255|unique:slots,name," . $this->slot->id . ",id,device_id," . $this->device->id,
            "capacity" => "required|numeric|min:1|max:1100"
        ], [
            "name.unique" => __("Numele trebuie să fie unic"),
            "name.required" => __("Numele este obligatoriu"),
            "name.min" => __("Numele trebuie să aibă cel puțin 3 caractere"),
            "name.max" => __("Numele trebuie să aibă cel mult 255 de caractere"),

            "capacity.required" => __("Capacitatea este obligatorie"),
            "capacity.numeric" => __("Capacitatea trebuie să fie un număr"),
            "capacity.min" => __("Capacitatea trebuie să fie de cel puțin 1"),
            "capacity.max" => __("Capacitatea trebuie să fie de cel mult 1100")
        ]);


        $this->slot->update([
            "name" => $this->name,
            "max_volume" => $this->capacity
        ]);
        $this->updated = true;
    }
    public function closeUpdated() {
        $this->updated = false;
    }

}
