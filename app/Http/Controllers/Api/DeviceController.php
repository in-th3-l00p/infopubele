<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller {
    public function updateLocation(Request $request, Device $device) {
        $request->validate([
            "latitude" => "required|numeric",
            "longitude" => "required|numeric"
        ],[
            "latitude.required" => "Latitudinea este obligatorie",
            "latitude.numeric" => "Latitudinea trebuie sa fie un numar",
            "longitude.required" => "Longitudinea este obligatorie",
            "longitude.numeric" => "Longitudinea trebuie sa fie un numar",
        ]);

        $device->update([
            "latitude" => $request->latitude,
            "longitude" => $request->longitude
        ]);

        return response("", 200);
    }

    public function cardsNumber(Device $device)
    {
        return response()->json([
            "cards" => Card::query()
                ->whereHas("slot", function ($query) use ($device) {
                    $query->where("device_id", $device->id);
                })
                ->count()
        ]);
    }
}
