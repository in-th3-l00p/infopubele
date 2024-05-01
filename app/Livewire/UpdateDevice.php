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
    public string $series;

    public function mount() {
        $this->name = $this->device->name;
        $this->city = $this->device->city;
        $this->series = $this->device->series;
    }

    public function render()
    {
        return view('livewire.update-device');
    }

    public function updateDevice() {
        $this->validate([
            'name' => 'required|min:1|max:255|unique:devices,name,' . $this->device->id,
            'city' => 'required|max:255',
            'series' => 'required|max:255|unique:devices,series,' . $this->device->id,
        ],[
            'name.required' => 'Numele este obligatoriu.',
            'name.unique' => 'Numele trebuie sa fie unic.',
            'name.max' => 'Numele trebuie sa aibă maxim 255 de caractere.',
            'name.min' => 'Numele trebuie sa aibă minim 1 caracter.',

            'city.required' => 'Orașul este obligatoriu.',
            'city.max' => 'Orașul trebuie sa aibă maxim 255 de caractere.',

            'series.required' => 'Seria este obligatorie.',
            'series.max' => 'Seria trebuie sa aibă maxim 255 de caractere.',
            'series.unique' => 'Seria trebuie sa fie unica.',
        ]);

        if(auth()->user()->role === "admin") {
            $this->device->update([
                'name' => $this->name,
                'city' => $this->city,
                'series' => $this->series,
            ]);

            $this->updated = true;
        } else {
            $this->device->update([
                'name' => $this->name,
                'city' => auth()->user()->city,
                'series' => $this->series,
            ]);

            $this->updated = true;
        }
    }

    public function closeUpdated() {
        $this->updated = false;
    }
}
