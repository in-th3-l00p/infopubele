<?php

use App\Http\Controllers\Operator\DeviceController;
use App\Http\Controllers\Operator\NotificationController;
use App\Http\Controllers\Operator\SlotController;
use App\Http\Controllers\Operator\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix("operator")
    ->middleware("can:operator")
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('operator.dashboard');
        Route::resource("devices", DeviceController::class)
            ->only([ "index", "show" ])
            ->names([
                "index" => "operator.devices.index",
                "show" => "operator.devices.show"
            ]);
        Route::resource("slots", SlotController::class)
            ->only([ "show" ])
            ->shallow()
            ->names([
                "show" => "operator.slots.show"
            ]);
        Route::resource("notifications", NotificationController::class)
            ->only([ "index" ])
            ->names([
                "index" => "operator.notifications.index"
            ])
            ->shallow();
        Route::resource("users", UserController::class)
            ->only([ "index", "create", "store", "destroy", "edit", "update"])
            ->names([
                "index" => "operator.users.index",
                "create" => "operator.users.create",
                "store" => "operator.users.store",
                "destroy" => "operator.users.destroy",
                "edit" => "operator.users.edit",
                "update" => "operator.users.update"
            ]);
    });
