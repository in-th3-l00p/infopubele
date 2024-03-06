<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Slot;
use Illuminate\Http\Request;

class UserSlotController extends Controller
{
    public function show(Slot $slot) {
        return view("roles.user.slots.show", [
            "slot" => $slot,
            "transactions" => $slot->transactions()->paginate(5),
            "device" => $slot->device()->first()
        ]);
    }
}
