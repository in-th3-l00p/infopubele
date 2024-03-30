<?php

namespace App\Http\Controllers\Uat;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    public function create(Device $device) {
        return view("roles.uat.slots.create", [
            "device" => $device
        ]);
    }
    public function show(Device $device,Slot $slot) {
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
        $slot->delete();
        return redirect()->route("uat.devices.show", $slot->device()->first());
    }

}
