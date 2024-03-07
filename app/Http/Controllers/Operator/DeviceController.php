<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DeviceController extends Controller
{
    public function index()
    {
        Gate::allowIf(function () {
            return auth()->user()->role === "admin" || auth()->user()->role === "operator";
        });
        return view('roles.operator.devices.index', [
            "devices" => Device::query()
                ->latest()
                ->where("city", "=", auth()->user()->city)
                ->paginate(5)
        ]);
    }
    public function show(Device $device) {
        Gate::allowIf(function () {
            return auth()->user()->role === "admin" || auth()->user()->role === "operator";
        });
        return view("roles.operator.devices.show", [
            "device" => $device,
            "slots" => $device
                ->slots()
                ->orderBy("order")
                ->paginate(5),
        ]);
    }
}
