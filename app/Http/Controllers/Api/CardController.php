<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Device;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index(Request $request) {
        $device = Device::query()->findOrFail($request->device_id);
        $query = Card::query()
            ->with("user")
            ->with("device");
        if ($request->has("user_id"))
            $query->where("user_id", $request->user_id);
        if ($request->has("card_id"))
            $query->where("uuid", $request->card_id);
        if ($request->has("device_id"))
            $query->where("device_id", $device->id);
        if ($request->has("slot_id"))
            $query->whereHas("device.slots",
                function ($query) use ($request) {
                    $query->where("id", $request->slot_id);
                });
        return $query->latest()->get();
    }

    public function store(Request $request) {
        $device = Device::query()->findOrFail($request->device_id);
        $request->validate([
            "user_id" => "required|exists:users,id",
        ],[
            "user_id.required" => "Userul este obligatoriu",
            "user_id.exists" => "Userul nu exista"
        ]);
        if (Card::where("user_id", $request->user_id)
            ->where("device_id", $device->id)
            ->exists())
            return response()->json([
                "message" => "Card already exists"
            ], 400);
        return Card::create([
            "user_id" => $request->user_id,
            "device_id" => $device->id,
            "uuid" => \Illuminate\Support\Str::uuid()->toString()
        ]);
    }

    public function show(Request $request, Card $card) {
        $device = Device::query()->findOrFail($request->device_id);
        return $card->load("user", "device");
    }

    // no need for implementation
    public function destroy(Request $request, Card $card) { }
}
