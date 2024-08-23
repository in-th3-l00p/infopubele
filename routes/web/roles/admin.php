<?php

// admin
use App\Http\Controllers\Admin\DeviceController;
use App\Http\Controllers\Admin\SlotController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix("/admin")
    ->middleware("can:admin")
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('admin.dashboard');
        Route::resource(
            "devices",
            DeviceController::class
        )
            ->except("edit", "update", "store");
        Route::prefix("devices/{device}")->group(function () {
            Route::resource("slots", SlotController::class)
                ->only([ "create", "show", "destroy" ])
                ->shallow();
        });
        Route::resource("users", UserController::class);
        Route::put("/users/device/{device}", [UserController::class, "assignDevice"])
            ->name("users.devices.assign");
        Route::delete("/users/{user}/device", [UserController::class, "removeDevice"])
            ->name("users.devices.remove");
    });
