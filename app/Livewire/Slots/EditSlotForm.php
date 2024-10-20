<?php

namespace App\Livewire\Slots;

use App\Models\Slot;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class EditSlotForm extends Component
{
    public Slot $slot;
    public array $state = [ ];

    public function mount(Slot $slot) {
        $this->slot = $slot;
        $this->state = [
            "name" => $slot->name,
            "max_volume" => $slot->max_volume,
        ];
    }

    public function updateSlot() {
        Validator::validate($this->state, [
            'name' => 'required|max:255',
            'max_volume' => 'required|numeric',
        ]);
        $this->slot->update([
            'name' => $this->state['name'],
            'max_volume' => $this->state['max_volume'],
        ]);
        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.slots.edit-slot-form');
    }
}
