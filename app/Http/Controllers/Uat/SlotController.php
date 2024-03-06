<?php

namespace App\Http\Controllers\Uat;

use App\Http\Controllers\Controller;
use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    public function show(Slot $slot) {
        return view("roles.uat.slots.show", [
            "slot" => $slot,
            "transactions" => $slot
                ->transactions()
                ->latest()
                ->paginate(5)
        ]);
    }
}
