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
        if ($this->device->name === $this->name) {
            $this->validate([
                'name' => 'required|min:1|max:255',
                'city' => 'required'
            ]);
        } else {
            $this->validate([
                'name' => 'required|min:1|max:255|unique:devices,name',
                'city' => 'required'
            ]);
        }


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
