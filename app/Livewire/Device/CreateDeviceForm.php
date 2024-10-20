<?php

namespace App\Livewire\Device;

use App\Models\Device;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class CreateDeviceForm extends Component
{
    public array $state = [];

    public function mount() {
        $this->state = [
            'name' => '',
            'series' => '',
            'city' => auth()->user()->city,
        ];
    }

    public function createDevice() {
        Validator::make($this->state, [
            'name' => 'required|max:255|unique:devices,name',
            'series' => 'required|max:255|unique:devices,series',
            'city' => 'required|max:255',
        ])->validate();

        $device = Device::create([
            'name' => $this->state['name'],
            'series' => $this->state['series'],
            'city' => $this->state['city'],
            'owner_id' => auth()->id(),
        ]);

        session()->flash('success', __('Dispozitivul a fost adăugat cu succes!'));
        $this->redirectRoute(auth()->user()->role . '.devices.index');
    }

    public function render()
    {
        return view('livewire.device.create-device-form');
    }
}
