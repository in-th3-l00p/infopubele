<?php

namespace App\Livewire;

use App\Models\Device;
use Livewire\Component;

class UpdateDevice extends Component
{
    public Device $device;
    public string $name;
    public string $city;
    public bool $updated = false;

    public function mount() {
        $this->name = $this->device->name;
        $this->city = $this->device->city;
    }

    public function render()
    {
        return view('livewire.update-device');
    }

    public function updateDevice() {
        $this->validate([
            'name' => 'required|min:1|max:255|unique:devices,name,' . $this->device->id,
            'city' => 'required'
        ],[
            'name.required' => 'Numele este obligatoriu.',
            'name.unique' => 'Numele trebuie sa fie unic.',
            'name.max' => 'Numele trebuie sa aibă maxim 255 de caractere.',
            'name.min' => 'Numele trebuie sa aibă minim 1 caracter.',
            'city.required' => 'Orașul este obligatoriu.',
        ]);

        $this->device->update([
            'name' => $this->name,
            'city' => $this->city,
        ]);

        $this->updated = true;
    }

    public function closeUpdated() {
        $this->updated = false;
    }
}
