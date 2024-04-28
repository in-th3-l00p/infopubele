<?php

use App\Http\Controllers\Admin\DeviceController;
use App\Http\Controllers\Admin\SlotController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Generator\DeviceReportController;
use App\Http\Controllers\Operator\NotificationController;
use App\Http\Controllers\User\UserDeviceController;
use App\Http\Controllers\User\UserSlotController;
use Illuminate\Support\Facades\Route;

Route::view("/", "welcome")->name("welcome");
Route::view("/about", "about")->name("about");
Route::view("/contact", "contact")->name("contact");
Route::post("/contact", function (\App\Http\Requests\ContactRequest $request) {
    $contact=\App\Models\Contact::create($request->validated());

    return redirect()
        ->route("contact",["contact"=>$contact->id])
        ->with("success", "Mesajul a fost trimis cu succes!");
})->name("contact.store");

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

    // user
    Route::get("/user/devices", [UserDeviceController::class, "show"])
        ->name("user.devices.show");
    Route::get("/user/devices/slots/{slot}", [UserSlotController::class, "show"])
        ->name("user.slots.show");

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
        Route::prefix("devices/{device}")->group(function () {
            Route::resource("slots", \App\Http\Controllers\Uat\SlotController::class)
                ->only([ "create", "show", "destroy" ])
                ->shallow()
                ->names([
                    "create" => "uat.slots.create",
                    "show" => "uat.slots.show",
                    "destroy" => "uat.slots.destroy"
                ]);
        });
        Route::resource("users", \App\Http\Controllers\Uat\UserController::class)
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
    //operator
    Route::prefix("operator")->group(function () {
        Route::resource("devices", \App\Http\Controllers\Operator\DeviceController::class)
            ->only([ "index", "show" ])
            ->names([
                "index" => "operator.devices.index",
                "show" => "operator.devices.show"
            ]);
        Route::resource("slots", \App\Http\Controllers\Operator\SlotController::class)
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
        Route::resource("users", \App\Http\Controllers\Operator\UserController::class)
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
});
