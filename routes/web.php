<?php

use App\Http\Controllers\Admin\DeviceController;
use App\Http\Controllers\Admin\SlotController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Generator\DeviceReportController;
use App\Http\Controllers\User\UserDeviceController;
use App\Http\Controllers\User\UserSlotController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $devices = \App\Models\Device::coordinates()->get();
    $mid_point = [
        \App\Models\Device::coordinates()->average("latitude"),
        \App\Models\Device::coordinates()->average("longitude")
    ];

    $max_distance = 0;
    foreach ($devices as $device) {
        $max_distance = max($max_distance, sqrt(
            ($mid_point[0] - $device->latitude) * ($mid_point[0] - $device->latitude) +
            ($mid_point[1] - $device->longitude) * ($mid_point[1] - $device->longitude)
        ));
    }

    return view('welcome', [
        "mid_point_x" => $mid_point[0],
        "mid_point_y" => $mid_point[1],
        "max_distance" => $max_distance,
        "devices" => $devices,
    ]);
})->name('welcome');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact', function (\App\Http\Requests\ContactRequest $request) {
    $contact=\App\Models\Contact::create($request->validated());

    return redirect()->route('contact',['contact'=>$contact->id]);
})->name('contact.store');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // admin
    Route::prefix("/admin")->middleware("admin")->group(function () {
        Route::resource("devices", DeviceController::class)
            ->except("edit", "update", "store");
        Route::post("/devices/{device}/tokens", [DeviceController::class, "createToken"])
            ->name("devices.tokens.create");
        Route::delete("/devices/{device}/tokens/{token}", [DeviceController::class, "deleteToken"])
            ->name("devices.tokens.delete");
        Route::resource("devices.slots", SlotController::class)
            ->only([ "create", "show" ])
            ->shallow();
        Route::resource("users", UserController::class);
    });

    // user
    Route::get("/user/devices", [UserDeviceController::class, "show"])
        ->name("user.devices.show");
    Route::get("/user/devices/slots/{slot}", [UserSlotController::class, "show"])
        ->name("user.devices.slots.show");

    // generator
    Route::resource("device-reports", DeviceReportController::class)
        ->only([ "index", "show", "create", "destroy" ]);

    // uat index
    Route::prefix("uat")->group(function () {
        Route::resource("devices", \App\Http\Controllers\Uat\DeviceController::class)
            ->only([ "index", "create", "show" ])
            ->names([
                "index" => "uat.devices.index",
                "create" => "uat.devices.create",
                "show" => "uat.devices.show"
            ]);
        Route::resource("devices.slots", \App\Http\Controllers\Uat\SlotController::class)
            ->only([ "show"  ])
            ->shallow()
            ->names([
                "show" => "uat.devices.slots.show"
            ]);
        Route::resource("users", \App\Http\Controllers\Uat\UserController::class)
            ->only([ "index", "create", "store" ])
            ->names([
                "index" => "uat.users.index",
                "create" => "uat.users.create",
                "store" => "uat.users.store"
            ]);
    });
});
