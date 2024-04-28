<?php

namespace App\View\Components;

use App\Models\Device;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use mysql_xdevapi\Collection;

class DevicesMap extends Component
{
    public $devices;

    public function __construct(
        public ?string $city = null
    ) {
        $this->devices = Device::query()
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->when($city, fn($query, $city) => $query->where('city', $city))
            ->get();
    }

    public function render(): View|Closure|string {
        return view('components.devices-map');
    }
}
