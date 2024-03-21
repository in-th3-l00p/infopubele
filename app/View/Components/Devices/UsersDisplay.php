<?php

namespace App\View\Components\Devices;

use App\Models\Device;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UsersDisplay extends Component
{
    public function __construct(
        public Device $device
    ) {
        //
    }

    public function render(): View|Closure|string
    {
        return view('components.devices.users-display', [
            "users" => $this->device->users()->get()
        ]);
    }
}
