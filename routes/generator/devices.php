<?php

use App\Http\Controllers\Generator\DeviceController;
use Illuminate\Support\Facades\Route;

Route::resource("devices", DeviceController::class)
    ->only(["index", "show"])
    ->middleware("auth");
