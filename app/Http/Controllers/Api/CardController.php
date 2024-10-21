<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Device;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index(Request $request) {
//        $device = Device::query()->findOrFail($request->device_id);
        $query = Card::query();
        if ($request->has("user_id"))
            $query->where("user_id", $request->user_id);
        if ($request->has("card_id"))
            $query->where("uuid", $request->card_id);
        if ($request->has("device_id"))
            $query->where("device_id", "=", $request->device_id);
        return $query
            ->latest()
            ->get()
            ->map(fn ($card) => $card->only("uuid"));
    }
}
