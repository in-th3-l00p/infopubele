<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Slot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class NotificationController extends Controller
{
    public function index() {
        return view("roles.operator.notifications.index", [
            "slots" => Slot::query()
                ->join("devices", "slots.device_id", "=", "devices.id")
                ->where("devices.city", "=", auth()->user()->city)
                ->get()
        ]);
    }
    public function store(Request $request)
    {
        $data = $request->validated([
            "slot_id" => "required|exists:slots,id",
        ]);
        $notification = Notification::query()->create([
            ...$data,
            "completed"=>"false"
        ]);

    }
    public function update(Request $request, Notification $notification)
    {
        $notification->completed = !$notification->completed;
        return view('roles.operator.devices.index');
    }

}
