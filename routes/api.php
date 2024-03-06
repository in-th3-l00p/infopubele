<?php

use Illuminate\Support\Facades\Route;

Route::post(
    "/slots/{slot}/transaction",
    [\App\Http\Controllers\Admin\SlotController::class, "transaction"]
)->name("slots.transaction");

Route::put(
    "/devices/{device}/location",
    [\App\Http\Controllers\Admin\DeviceController::class, "updateLocation"]
);
