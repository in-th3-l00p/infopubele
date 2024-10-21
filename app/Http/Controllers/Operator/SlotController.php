<?php

namespace App\Http\Controllers\Operator;

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
        return view("roles.operator.slots.create", compact("device"));
    }

    public function show(Device $device, Slot $slot)
    {
        Gate::authorize("view", $device);
        return view("roles.operator.slots.show", compact("device", "slot"));
    }
}
