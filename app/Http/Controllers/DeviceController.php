<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index() {
        return view("devices.index", [
            "devices" => Device::query()->paginate(5)
        ]);
    }

    public function create() {
        return view("devices.create");
    }

//    public function store(Request $request)
//    {
//    }

    public function show(Device $device) {
        return view("devices.show", [
            "device" => $device
        ]);
    }

    public function edit(Device $device) {
        //
    }

    public function update(Request $request, Device $device)
    {
        //
    }

    public function destroy(Device $device)
    {
        //
    }
}
