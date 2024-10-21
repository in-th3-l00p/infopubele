<?php

namespace App\Livewire\Slots;

use App\Models\Device;
use App\Models\Slot;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Tests\Unit\Models\SlotTest;

class CreateSlotForm extends Component
{
    public Device $device;
    public array $state = [];

    public function mount(Device $device)
    {
        $this->device = $device;
    }

    public function createSlot()
    {
        Validator::make($this->state, [
            'name' => 'required|max:255',
            'max_volume' => 'required|numeric',
        ])->validate();

        $slot = Slot::create([
            'name' => $this->state['name'],
            'max_volume' => $this->state['max_volume'],
            'owner_id' => auth()->id(),
            'device_id' => $this->device->id,
        ]);

        session()->flash('success', __("Slot adăugat cu succes!"));
        $this->redirectRoute(auth()->user()->role . '.devices.slots.show', [
            'device' => $this->device,
            'slot' => $slot
        ]);
    }

    public function render()
    {
        return view('livewire.slots.create-slot-form');
    }
}
