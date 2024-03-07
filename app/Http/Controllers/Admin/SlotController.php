<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\DeviceNotificationMail;
use App\Models\Device;
use App\Models\Slot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        if (($slot->volume / $slot->max_volume) * 100 > 90) {
            $operators = User::query()
                ->where("role", "=", "operator")
                ->where("city", "=", $slot->device()->first()->city)
                ->get();
            foreach ($operators as $operator) {
                Mail
                    ::to($operator->email)
                    ->queue(new DeviceNotificationMail($slot));
            }
        }
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
        return redirect()->route("devices.show", $slot->device()->first());
    }
}
