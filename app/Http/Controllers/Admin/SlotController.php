<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\DeviceNotificationMail;
use App\Models\Device;
use App\Models\Slot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SlotController extends Controller
{
    public function index() {
    }

    public function create(Device $device) {
        return view("roles.admin.slots.create", [
            "device" => $device
        ]);
    }

    public function store(Request $request) {
    }

    public function show(Device $device,Slot $slot) {
        return view("roles.admin.slots.show", [
            "slot" => $slot,
            "transactions" => $slot->transactions()->paginate(5),
            "device" => $slot->device()->first()
        ]);
    }

    public function edit(Slot $slot) {
    }

    public function update(Request $request, Slot $slot) {
    }

    public function destroy(Device $device,Slot $slot) {
        $slot->delete();
        return redirect()->route("devices.show", $slot->device()->first());
    }
}
