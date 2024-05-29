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
        return view('roles.operator.devices.index', [
            "devices" => Device::query()
                ->latest()
                ->where("city", "=", auth()->user()->city)
                ->paginate(5)
        ]);
    }
    public function show(Device $device) {
        Gate::allowIf(
            auth()->user()->city === $device->city || auth()->user()->role === 'admin',
            __("You are not authorized to access this page.")
        );
        return view("roles.operator.devices.show", [
            "device" => $device,
            "slots" => $device
                ->slots()
                ->orderBy("order")
        ]);
    }
}
