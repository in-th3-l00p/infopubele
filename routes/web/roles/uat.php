<?php

// uat index
use App\Http\Controllers\Uat\DeviceController;
use App\Http\Controllers\Uat\SlotController;
use App\Http\Controllers\Uat\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix("uat")
    ->middleware("can:uat")
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('uat.dashboard');
        Route::middleware("uat")->group(function(){
            Route::resource("devices", DeviceController::class)
                ->only([ "index", "create", "show" ])
                ->names([
                    "index" => "uat.devices.index",
                    "create" => "uat.devices.create",
                    "show" => "uat.devices.show"
                ]);
            Route::prefix("devices/{device}")->group(function () {
                Route::resource("slots", SlotController::class)
                    ->only([ "create", "show", "destroy" ])
                    ->shallow()
                    ->names([
                        "create" => "uat.slots.create",
                        "show" => "uat.slots.show",
                        "destroy" => "uat.slots.destroy"
                    ]);
            });
            Route::resource("users", UserController::class)
                ->only([ "index","edit","update", "create", "store","destroy" ])
                ->names([
                    "index" => "uat.users.index",
                    "create" => "uat.users.create",
                    "store" => "uat.users.store",
                    "destroy" => "uat.users.destroy",
                    "edit" => "uat.users.edit",
                    "update" => "uat.users.update"
                ]);
        });
    });
