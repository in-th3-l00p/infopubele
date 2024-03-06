<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    public function index() {
    }

    public function create(Device $device) {
        return view("roles.admin.slots.create", [
            "device" => $device
        ]);
    }

    public function store(Request $request) {
    }

    public function transaction(Request $request, Slot $slot) {
        $request->validate([
            "amount" => [
                "required",
                "numeric",
                "min:" . -$slot->volume,
                "max:" . $slot->max_volume - $slot->volume
            ],
            "token" => "required|exists:device_tokens,token"
        ]);

        if (!$slot
            ->device()
            ->first()
            ->tokens()
            ->where("token", $request->token)
            ->exists()
        )
            return response()->json([
                "message" => "Invalid token"
            ], 401);


        $slot->transactions()->create([
            "amount" => $request->amount
        ]);
        $slot->update([
            "volume" => $slot->volume + $request->amount
        ]);
        return response("", 201);
    }

    public function show(Slot $slot) {
        return view("roles.admin.slots.show", [
            "slot" => $slot,
            "transactions" => $slot->transactions()->paginate(5),
            "device" => $slot->device()->first()
        ]);
    }

    public function edit(Slot $slot) {
    }

    public function update(Request $request, Slot $slot) {
    }

    public function destroy(Slot $slot) {
        $slot->delete();
        return redirect()->route("roles.admin.devices.show", $slot->device()->first());
    }
}
