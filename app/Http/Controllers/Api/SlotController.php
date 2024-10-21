<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\DeviceNotificationMail;
use App\Models\Device;
use App\Models\Slot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SlotController extends Controller {
    public function index(Request $request) {
        return Device::query()
            ->findOrFail($request->device_id)
            ->slots()
            ->get()
            ->map(fn ($slot) => $slot->only("id", "name", "max_volume", "volume"));
    }

    public function show(Slot $slot) {
        $device = $slot->device()->first();
        if ($device->id != $slot->device()->first()->id)
            return response()->json([
                "message" => "Invalid device"
            ], 401);
        return response()->json([
            "id" => $slot->id,
            "name" => $slot->name,
            "max_volume" => $slot->max_volume,
            "volume" => $slot->volume
        ]);
    }

    public function transaction(Request $request, Slot $slot) {
        $request->validate([
            "amount" => [
                "required",
                "numeric"
            ],
            "card_uuid" => "required|exists:cards,uuid",
        ]);

        $device = Device::query()->findOrFail($request->device_id);
        if ($slot->device()->first()->id != $device->id)
            return response()->json([
                "message" => "Invalid device or slot"
            ], 401);
        $card = $device
            ->cards()
            ->where("uuid", $request->card_uuid)
            ->first();
        if ($card === null)
            return response()->json([
                "message" => "Invalid card"
            ], 401);

        $slot->transactions()->create([
            "amount" => $request->amount,
            "card_id" => $card->id
        ]);
        $slot->update([
            "volume" => $slot->volume + $request->amount
        ]);
        if (($slot->volume / $slot->max_volume) * 100 > 90) {
            $operators = User::query() // todo use associations
            ->where("role", "=", "operator")
                ->where("city", "=", $device->city)
                ->get();
            foreach ($operators as $operator) {
                Mail
                    ::to($operator->email)
                    ->queue(new DeviceNotificationMail($slot));
            }
        }
        return response("", 201);
    }

    public function reset(Request $request, Slot $slot) {
        $request->validate([
            "card_uuid" => "required|exists:cards,uuid",
            "volume" => "required|numeric|min:0"
        ]);

        $device = Device::query()->findOrFail($request->device_id);
        if ($slot->device()->first()->id != $device->id)
            return response()->json([
                "message" => "Invalid device or slot"
            ], 401);
        $card = $device
            ->cards()
            ->where("uuid", $request->card_uuid)
            ->first();
        if ($card === null)
            return response()->json([
                "message" => "Invalid card"
            ], 401);

        $slot->transactions()->create([
            "amount" => $slot->volume - $request->volume,
            "card_id" => $card->id
        ]);
        $slot->update([
            "volume" => $request->volume
        ]);
        return response("", 201);
    }
}
