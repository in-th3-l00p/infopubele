<?php

use App\Http\Controllers\Api\ApiSlotController;
use App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Api\DeviceController;
use Illuminate\Support\Facades\Route;

Route::resource("cards", CardController::class)->except("update");
Route::resource("slots", ApiSlotController::class)->only([ "index", "show" ]);

Route::post(
    "/slots/{slot}/transaction",
    [ApiSlotController::class, "transaction"]
)->name("slots.transaction");

Route::put(
    "/devices/{device}/location",
    [DeviceController::class, "updateLocation"]
);

Route::get("/devices/{device}/cards", [
    DeviceController::class,
    "cardsNumber"
]);
