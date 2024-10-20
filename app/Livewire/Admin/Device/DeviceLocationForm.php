<?php

namespace App\Livewire\Admin\Device;

use App\Models\Device;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class DeviceLocationForm extends Component
{
    public Device $device;
    public array $state = [ ];

    public function mount(Device $device) {
        $this->device = $device;
        $this->state = [
            "latitude" => $device->latitude,
            "longitude" => $device->longitude
        ];
    }

    public function updateDevice() {
        Validator::validate($this->state, [
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);
        $this->device->update([
            'latitude' => $this->state['latitude'],
            'longitude' => $this->state['longitude'],
        ]);
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.admin.device.device-location-form');
    }
}
