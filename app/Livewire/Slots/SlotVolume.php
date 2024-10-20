<?php

namespace App\Livewire\Slots;

use App\Models\Slot;
use Livewire\Component;

class SlotVolume extends Component
{
    public Slot $slot;

    public function render()
    {
        return view('livewire.slots.slot-volume');
    }
}
