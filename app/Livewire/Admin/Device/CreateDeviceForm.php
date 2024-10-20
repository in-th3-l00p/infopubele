<?php

namespace App\Livewire\Admin\Device;

use App\Models\Device;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class CreateDeviceForm extends Component
{
    public array $state = [];

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

        session()->flash('success', 'Device added successfully!');
        $this->redirectRoute('admin.devices.index');
    }

    public function render()
    {
        return view('livewire.admin.device.create-device-form');
    }
}
