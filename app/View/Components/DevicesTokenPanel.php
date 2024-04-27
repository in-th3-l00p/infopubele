<?php

namespace App\View\Components;

use App\Models\Device;
use App\Models\DeviceToken;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class DevicesTokenPanel extends Component
{
    public $tokens;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public Device $device
    )
    {
        $this->tokens = $this->device->tokens()->paginate(5);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.devices-token-panel');
    }
}
