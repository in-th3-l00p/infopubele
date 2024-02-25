<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\SlotController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource("devices", DeviceController::class);
    Route::post("/devices/{device}/tokens", [DeviceController::class, "createToken"])
        ->name("devices.tokens.create");
    Route::delete("/devices/{device}/tokens/{token}", [DeviceController::class, "deleteToken"])
        ->name("devices.tokens.delete");
    Route::resource("devices.slots", SlotController::class)->shallow();
});
