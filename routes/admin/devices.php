<?php

use App\Http\Controllers\Admin\DeviceController;
use Illuminate\Support\Facades\Route;

Route::resource("devices", DeviceController::class)
    ->except(["store", "edit", "update"])
    ->middleware("auth");
