<?php

// user
use App\Http\Controllers\User\UserDeviceController;
use App\Http\Controllers\User\UserSlotController;
use Illuminate\Support\Facades\Route;

Route::prefix("/user")
    ->middleware("can:user")
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('user.dashboard');
        Route::get("/user/devices", [UserDeviceController::class, "show"])
            ->name("user.devices.show");
        Route::get("/user/devices/slots/{slot}", [UserSlotController::class, "show"])
            ->name("user.slots.show");
    });
