<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DeviceController extends Controller
{
    public function show(Request $request)
    {
        if ($request->user()->associatedDevice === null)
            return view("roles.user.devices.no-device");
        return view("roles.user.devices.show", [
            "device" => $request->user()->associatedDevice
        ]);
    }
}
