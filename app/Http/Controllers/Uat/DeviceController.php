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
        Gate::allowIf(function () {
            return auth()->user()->role === "admin" || auth()->user()->role === "uat";
        });

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
        return view("roles.uat.devices.show", [
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
}
