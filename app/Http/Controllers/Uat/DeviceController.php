<?php

namespace App\Http\Controllers\Uat;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\DeviceReport;
use App\Models\DeviceToken;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class DeviceController extends Controller
{
    public function index()
    {
        return view('roles.uat.devices.index', [
            "devices" => Device::query()
                ->latest()
                ->where("city", "=", auth()->user()->city)
                ->paginate(5)
        ]);
    }

    public function create() {
        return view("roles.uat.devices.create");
    }

    public function show(Device $device) {
        Gate::allowIf(
    auth()->user()->city === $device->city || auth()->user()->role === 'admin',
    __("You are not authorized to access this page.")
);
        return view("roles.uat.devices.show", [
            "device" => $device,
            "slots" => $device
                ->slots()
                ->orderBy("order"),
            "tokens" => $device->tokens()->paginate(5),
            "transactions" => Transaction::query()
                ->join("slots", "transactions.slot_id", "=", "slots.id")
                ->where("slots.device_id", $device->id)
                ->latest()
        ]);
    }
}
