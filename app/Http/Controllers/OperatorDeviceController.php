<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class OperatorDeviceController extends Controller
{
    public function index() {
        return route("operator.devices.index", [
            "devices" => Device::query()
                ->where("city", "=", auth()->user()->city)
                ->paginate(5)
        ]);
    }
}
