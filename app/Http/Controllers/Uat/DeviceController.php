<?php

namespace App\Http\Controllers\Uat;

use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DeviceController extends Controller
{
    public function index(Request $request)
    {
        Gate::authorize("viewAny", Device::class);
        return view("roles.uat.devices.index", [
            "devices" => Device::query()
                ->where("city", "=", auth()->user()->city)
                ->when($request->has("search"), fn($query) => $query->where("name", "like", "%{$request->search}%"))
                ->orderBy("created_at", "desc")
                ->paginate(6)
        ]);
    }

    public function create()
    {
        Gate::authorize("create", Device::class);
        return view("roles.uat.devices.create");
    }

    public function show(Device $device)
    {
        Gate::authorize("view", $device);
        Gate::authorize("update", $device);
        Gate::authorize("delete", $device);
        return view("roles.uat.devices.show", [
            "device" => $device
        ]);
    }

    public function destroy(Device $device)
    {
        Gate::authorize("delete", $device);
        $device->delete();
        return redirect()
            ->route("uat.devices.index")
            ->with("success", "Device deleted successfully");
    }
}
