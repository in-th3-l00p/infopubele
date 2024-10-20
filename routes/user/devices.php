<?php

use App\Http\Controllers\User\DeviceController;
use Illuminate\Support\Facades\Route;

Route::resource("devices", DeviceController::class)
    ->only([ "show" ])
    ->middleware("auth");
