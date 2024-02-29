<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DeviceToken;
use App\Models\Slot;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DeviceController extends Controller
{
    public function index() {
        return view("devices.index", [
            "devices" => Device::query()->latest()->paginate(5)
        ]);
    }

    public function create() {
        return view("devices.create");
    }

//    public function store(Request $request)
//    {
//    }



    public function createToken(Device $device) {
        $token = Str::random(64);
        while ($device->tokens()->where("token", $token)->exists())
            $token = Str::random(64);
        $device->tokens()->create([
            "token" => $token
        ]);

        return redirect()->route("devices.show", $device);
    }

    public function deleteToken(Device $device, DeviceToken $token) {
        $token->delete();
        return redirect()->route("devices.show", $device);
    }

    public function show(Device $device) {
        return view("devices.show", [
            "device" => $device,
            "slots" => $device
                ->slots()
                ->orderBy("order")
                ->paginate(5),
            "tokens" => $device->tokens()->paginate(5),
            "transactions" => Transaction::query()
                ->join("slots", "transactions.slot_id", "=", "slots.id")
                ->where("slots.device_id", $device->id)
                ->latest()
                ->paginate(5)
        ]);
    }

    public function edit(Device $device) {
        //
    }

    public function update(Request $request, Device $device)
    {
        //
    }

    public function updateLocation(Request $request, Device $device) {
        $request->validate([
            "latitude" => "required|numeric",
            "longitude" => "required|numeric",
            "token" => "required|exists:device_tokens,token"
        ]);


        if (!$device
            ->tokens()
            ->where("token", $request->token)
            ->exists()
        )
            return response()->json([
                "message" => "Invalid token"
            ], 401);

        $device->update([
            "latitude" => $request->latitude,
            "longitude" => $request->longitude
        ]);

        return response("", 200);
    }

    public function destroy(Device $device)
    {
        //
    }
}
