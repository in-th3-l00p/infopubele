<?php

namespace App\Livewire;

use App\Models\Device;
use App\Models\Slot;
use Livewire\Component;

class UpdateSlot extends Component
{
    public Slot $slot;
    public string $name;
    public float $capacity;

    public function mount() {
        $this->name = $this->slot->name;
        $this->capacity = $this->slot->max_volume;
    }

    public function render()
    {
        return view('livewire.update-slot');
    }
}
