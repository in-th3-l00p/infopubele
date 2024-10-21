<?php

use App\Http\Controllers\User\DeviceController;
use Illuminate\Support\Facades\Route;

Route::get("/devices/show", [DeviceController::class, "show"])
    ->name("user.devices.show");
