<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\DeviceNotificationMail;
use App\Models\Device;
use App\Models\DeviceToken;
use App\Models\Slot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApiSlotController extends Controller {
    public function index(Request $request) {
        return Device::query()
            ->findOrFail($request->device_id)
            ->slots()
            ->get();
    }

    public function store(Request $request) {
        $device = Device::query()->findOrFail($request->device_id);
        $request->validate([
            "name" => "required|min:3|max:255|unique:slots,name,NULL,id,device_id," . $device->id,
            "capacity" => "required|numeric|min:1|max:1100"
        ], [
            "name.unique" => __("Numele trebuie să fie unic"),
            "name.required" => __("Numele este obligatoriu"),
            "name.min" => __("Numele trebuie să aibă cel puțin 3 caractere"),
            "name.max" => __("Numele trebuie să aibă cel mult 255 de caractere"),

            "capacity.required" => __("Capacitatea este obligatorie"),
            "capacity.numeric" => __("Capacitatea trebuie să fie un număr"),
            "capacity.min" => __("Capacitatea trebuie să fie de cel puțin 1"),
            "capacity.max" => __("Capacitatea trebuie să fie de cel mult 1100")
        ]);

        $slot = Slot::create([
            "name" => $request->name,
            "max_volume" => $request->capacity,
            "volume" => 0,
            "device_id" => $device->id,
            "order" => $device->slots()->count()
        ]);

        return response()->json($slot, 201);
    }

    public function transaction(Request $request, Slot $slot) {
        $request->validate([
            "amount" => [
                "required",
                "numeric",
                "min:" . -$slot->volume,
                "max:" . $slot->max_volume - $slot->volume
            ],
            "card_uuid" => "required|exists:cards,uuid",
        ]);

        $device = Device::query()->findOrFail($request->device_id);
        if ($slot->device()->first()->id != $device->id)
            return response()->json([
                "message" => "Invalid device"
            ], 401);
        $card = $slot->device()->first()->cards()->where("uuid", $request->card_uuid)->first();
        if ($card->device_id != $device->id)
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
        $device = $slot->device()->first();
        if ($device->id != $slot->device()->first()->id)
            return response()->json([
                "message" => "Invalid device"
            ], 401);
        return $slot;
    }
}
