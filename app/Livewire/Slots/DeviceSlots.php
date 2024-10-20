<?php

namespace App\Livewire\Slots;

use App\Models\Device;
use Livewire\Component;

class DeviceSlots extends Component
{
    public Device $device;

    public function render()
    {
        $slots = $this
            ->device
            ->slots()
            ->orderBy("created_at", "desc")
            ->get();
        return view('livewire.slots.device-slots', ["slots" => $slots]);
    }
}
