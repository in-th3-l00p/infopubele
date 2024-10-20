<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DeviceController extends Controller
{
    public function show(Device $device)
    {
        Gate::authorize("view", $device);
        return view("roles.user.devices.show", [
            "device" => $device
        ]);
    }
}
