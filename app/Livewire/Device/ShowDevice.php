<?php

namespace App\Livewire\Device;

use App\Models\Device;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ShowDevice extends Component
{
    public Device $device;
    public array $state = [];

    public function mount(Device $device): void
    {
        $this->device = $device;
        $this->state = [
            "name" => $device->name,
            "series" => $device->series,
            "city" => $device->city,
        ];
    }

    public function render(): View
    {
        return view('livewire.device.show-device');
    }
}
