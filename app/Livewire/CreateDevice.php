<?php

namespace App\Livewire;

use App\Models\Device;
use Livewire\Component;

class CreateDevice extends Component
{
    public string $name;
    public string $city = "New York";

    public function render() {
        return view('livewire.create-device');
    }

    public function createDevice() {
        $this->validate([
            'name' => 'required|min:1|max:255|unique:devices,name',
            'city' => 'required|min:1|max:255',
        ]);

        Device::create([
            'name' => $this->name,
            'city' => $this->city,
        ]);

        return redirect()->route('devices.index')->with([
            "success" => "Device created successfully."
        ]);
    }
}
