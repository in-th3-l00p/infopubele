<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index() {
        return view("roles.operator.notifications.index", [
            "notifications" => Notification::query()->where("completed","=","false")->paginate(5)
        ]);
    }
    public function store(Request $request)
    {
        $data = $request->validated();
        $notification = Notification::query()->create([
            ...$data,
            "completed"=>"false"
        ]);

    }
    public function update(Request $request, Notification $notification)
    {
        $notification->completed= !$notification->completed;
        return view('roles.operator.devices.index');
    }

}
