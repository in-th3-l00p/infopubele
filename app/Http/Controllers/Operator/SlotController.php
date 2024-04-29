<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Slot;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    public function show(Slot $slot) {
        Gate::allowIf(
            auth()->user()->city === $slot->device->city,
            __("You are not authorized to access this page.")
        );
        return view("roles.operator.slots.show", [
            "slot" => $slot
        ]);
    }
}
