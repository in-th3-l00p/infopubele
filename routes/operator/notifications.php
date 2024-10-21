<?php

use App\Models\Device;
use Illuminate\Support\Facades\Route;

Route::get("/operator/notifications", function () {
    $devices = request()
        ->user()
        ->associatedDevices()
        ->get()
        ->filter(function ($device) {
            foreach ($device->slots as $slot)
                if (($slot->volume / $slot->max_volume) * 100 > 90)
                    return true;
            return false;
        });
    return view("roles.operator.notifications", [
        "devices" => $devices
    ]);
})->name("operator.notifications");
