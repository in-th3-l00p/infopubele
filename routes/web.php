<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\SlotController;
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

    dd($devices);
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
    Route::middleware("admin")->group(function () {
        Route::resource("devices", DeviceController::class);
        Route::post("/devices/{device}/tokens", [DeviceController::class, "createToken"])
            ->name("devices.tokens.create");
        Route::delete("/devices/{device}/tokens/{token}", [DeviceController::class, "deleteToken"])
            ->name("devices.tokens.delete");
        Route::resource("devices.slots", SlotController::class)->shallow();
        Route::resource("users", \App\Http\Controllers\AdminUserController::class);
    });
});
