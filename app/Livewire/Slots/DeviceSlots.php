<?php

namespace App\Livewire\Slots;

use App\Models\Device;
use Livewire\Component;

class DeviceSlots extends Component
{
    public Device $device;

    public function render()
    {
        $slots = $this->device->slots()->get();
        return view('livewire.slots.device-slots', ["slots" => $slots]);
    }
}
