<?php

namespace App\Livewire\Admin\Device;

use App\Models\Device;
use Livewire\Component;

class CreateDeviceForm extends Component
{
    public $state = [];

    public function createDevice() {
        $this->validate([
            'state.name' => 'required|max:255|unique:devices,name',
            'state.series' => 'required|max:255|unique:devices,series',
            'state.city' => 'required|max:255',
        ]);

        $device = Device::create([
            'name' => $this->state['name'],
            'series' => $this->state['series'],
            'city' => $this->state['city'],
            'owner_id' => auth()->id(),
        ]);

        session()->flash('success', 'Device added successfully!');
        $this->redirectRoute('admin.devices.index');
    }

    public function render()
    {
        return view('livewire.admin.device.create-device-form');
    }
}
