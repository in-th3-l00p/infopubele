<?php

use App\Http\Controllers\Uat\DeviceController;
use Illuminate\Support\Facades\Route;

Route::resource("devices", DeviceController::class)
    ->except(["store", "edit", "update"])
    ->middleware("auth");
