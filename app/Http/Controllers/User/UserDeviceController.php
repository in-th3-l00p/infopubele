<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class UserDeviceController extends Controller {
    public function show() {
        if (auth()->user()->device() === null)
            return redirect()->route("dashboard");
        return view("roles.user.devices.show", [
            "device" => auth()->user()->device()->first()
        ]);
    }
}
