<?php

namespace App\Livewire\Device;

use App\Models\Device;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class EditDeviceForm extends Component
{
    public Device $device;
    public array $state = [ ];

    public function mount(Device $device) {
        $this->device = $device;
        $this->state = [
            "name" => $device->name,
            "series" => $device->series,
            "city" => $device->city,
        ];
    }

    public function updateDevice() {
        Validator::validate($this->state, [
            'name' => 'required|max:255',
            'series' => 'required|max:255',
            'city' => 'required|max:255',
        ]);
        if ($this->state["name"] !== $this->device->name)
            Validator::make($this->state, [
                'name' => 'unique:devices,name',
            ])->validate();
        if ($this->state["series"] !== $this->device->series)
            Validator::make($this->state, [
                'series' => 'unique:devices,series',
            ])->validate();
        if (auth()->user()->role === "admin")
            $this->device->update([
                'name' => $this->state['name'],
                'series' => $this->state['series'],
                'city' => $this->state['city'],
            ]);
        else
            $this->device->update([
                'name' => $this->state['name'],
                'series' => $this->state['series'],
            ]);
        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.device.edit-device-form');
    }
}
