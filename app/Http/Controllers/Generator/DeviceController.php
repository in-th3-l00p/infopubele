<?php

namespace App\Http\Controllers\Generator;

use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DeviceController extends Controller
{
    public function index(Request $request)
    {
        Gate::authorize("viewAny", Device::class);
        return view("roles.generator.devices.index", [
            "devices" => $request->user()->associatedDevices()
                ->when($request->has("search"), fn($query) => $query->where("name", "like", "%{$request->search}%"))
                ->paginate()
        ]);
    }

    public function show(Device $device)
    {
        Gate::authorize("view", $device);
        return view("roles.generator.devices.show", [
            "device" => $device
        ]);
    }
}
