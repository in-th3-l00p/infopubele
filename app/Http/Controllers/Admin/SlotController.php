<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Slot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SlotController extends Controller
{
    public function create(Device $device)
    {
        Gate::authorize("update", $device);
        return view("admin.slots.create", compact("device"));
    }

    public function show(Device $device, Slot $slot)
    {
        Gate::authorize("view", $device);
        return view("admin.slots.show", compact("device", "slot"));
    }

    public function destroy(Device $device, Slot $slot)
    {
        Gate::authorize("update", $device);
        $slot->delete();
        return redirect()
            ->route("admin.devices.show", $device)
            ->with("success", "Slot deleted successfully");
    }
}
