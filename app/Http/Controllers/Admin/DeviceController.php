<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DeviceController extends Controller
{
    public function index() {
        return view("roles.admin.devices.index", [
            "devices" => Device::query()->latest()->paginate(5)
        ]);
    }

    public function create() {
        return view("roles.admin.devices.create");
    }

    public function show(Device $device) {
        return view("roles.admin.devices.show", [
            "device" => $device,
            "slots" => $device
                ->slots()
                ->orderBy("order")
                ->get(),
            "transactions" => Transaction::query()
                ->join("slots", "transactions.slot_id", "=", "slots.id")
                ->where("slots.device_id", $device->id)
                ->select("transactions.*")
                ->latest()
                ->paginate(5)
                ->fragment('transactions')
        ]);
    }


    public function destroy(Device $device)
    {
        $device->delete();
        return redirect()->route("devices.index");
    }
}
