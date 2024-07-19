<?php

namespace App\Http\Controllers\Uat;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Slot;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    public function create(Device $device) {
        Gate::allowIf(
            auth()->user()->city === $device->city || auth()->user()->role === 'admin',
            __("You are not authorized to access this page.")
        );
        return view("roles.uat.slots.create", [
            "device" => $device
        ]);
    }
    public function show(Device $device,Slot $slot) {
        Gate::allowIf(
    auth()->user()->city === $slot->device->city || auth()->user()->role === 'admin',
    __("You are not authorized to access this page.")
);
        return view("roles.uat.slots.show", [
            "device" => $device,
            "slot" => $slot,
            "transactions" => $slot
                ->transactions()
                ->latest()
                ->paginate(5)
        ]);
    }
    public function destroy(Slot $slot) {
        Gate::allowIf(
            auth()->user()->city === $slot->device->city || auth()->user()->role === 'admin',
            __("You are not authorized to access this page.")
        );
        $slot->delete();
        return redirect()->route("uat.devices.show", $slot->device()->first());
    }

}
