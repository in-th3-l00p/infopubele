<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    public function show(Slot $slot) {
        return view("roles.operator.slots.show", [
            "slot" => $slot
        ]);
    }
}
