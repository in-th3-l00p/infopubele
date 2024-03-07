<?php

namespace App\View\Components;

use App\Models\Device;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SlotVisualizer extends Component
{
    public function __construct(
        public Device $device
    ) {
    }

    public function render(): View|Closure|string {
        return view('components.slot-visualizer');
    }
}
