<?php

namespace App\Livewire;

use App\Models\Device;
use App\Models\Slot;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateSlot extends Component
{
    public Device $device;
    public string $name;
    public string $type;
    public float $capacity;

    public function render()
    {
        return view('livewire.create-slot');
    }

    public function createSlot() {
        $this->validate([
            "name" => "required|min:3|max:255|unique:slots,name,NULL,id,device_id," . $this->device->id,
            "capacity" => "required|numeric|min:1|max:1100",
            "type" => [
                "required",
                "in:paper/cardboard,residual,biodegradable,plastic/metal",
                Rule::unique('slots', 'type')->where(function ($query) {
                    return $query->where('device_id', $this->device->id);
                }),
            ]
        ], [
            "name.unique" => __("Numele trebuie să fie unic"),
            "name.required" => __("Numele este obligatoriu"),
            "name.min" => __("Numele trebuie să aibă cel puțin 3 caractere"),
            "name.max" => __("Numele trebuie să aibă cel mult 255 de caractere"),
            "capacity.required" => __("Capacitatea este obligatorie"),

            "capacity.numeric" => __("Capacitatea trebuie să fie un număr"),
            "capacity.min" => __("Capacitatea trebuie să fie de cel puțin 1"),
            "capacity.max" => __("Capacitatea trebuie să fie de cel mult 1100"),

            "type.in" => __("Tipul trebuie să fie unul dintre: hartie/carton, rezidual, biodegradabil, plastic/metal"),
            "type.required" => __("Tipul este obligatoriu"),
            "type.unique" => __("Nu pot fi 2 sloturi de acelasi tip pentru un dispozitiv")
        ]);

        $slot = Slot::create([
            "name" => $this->name,
            "max_volume" => $this->capacity,
            "volume" => 0,
            "device_id" => $this->device->id,
            "order" => $this->device->slots()->count(),
            "type" => $this->type
        ]);

        if(auth()->user()->role === "admin") {
            return redirect()->route("slots.show", [
                "device" => $this->device,
                "slot" => $slot
            ]);
        }
        elseif (auth()->user()->role === "uat") {
            return redirect()->route("uat.slots.show", [
                "device"=>$this->device,
                "slot"=>$slot
            ]);
        }

        return redirect()->route("slots.show", [
            "device" => $this->device,
            "slot" => $slot
        ]);
    }
}
