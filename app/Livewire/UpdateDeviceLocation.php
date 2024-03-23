<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Device;

class UpdateDeviceLocation extends Component
{
    public Device $device;
    public float $latitude;
    public float $longitude;

    public function mount() {
        $this->latitude = $this->device->latitude !== null ? $this->device->latitude : 0;
        $this->longitude = $this->device->longitude !== null ? $this->device->longitude : 0;
    }

    public function render()
    {
        return view('livewire.update-device-location');
    }

    public function updateLocation() {
        $this->validate([
            "latitude" => "required|numeric",
            "longitude" => "required|numeric",
        ]);

        $this->device->update([
            "latitude" => $this->latitude,
            "longitude" => $this->longitude
        ]);

        return redirect()
            ->route("devices.show", $this->device)
            ->with("locationSuccess", "Device location updated successfully.");
    }
}
