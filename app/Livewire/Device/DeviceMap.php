<?php

namespace App\Livewire\Device;

use App\Models\Device;
use Livewire\Component;

class DeviceMap extends Component
{
    public Device $device;

    public function render()
    {
        return view('livewire.device.device-map');
    }
}
