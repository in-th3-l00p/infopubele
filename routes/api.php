<?php

use App\Http\Controllers\Api\SlotController;
use App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Api\DeviceController;
use Illuminate\Support\Facades\Route;

Route::resource("cards", CardController::class)->only("index");
Route::resource("slots", SlotController::class)->only(["index", "show"]);

Route::post(
    "/slots/{slot}/transaction",
    [SlotController::class, "transaction"]
)->name("slots.transaction");

Route::post(
    "/slots/{slot}/reset",
    [SlotController::class, "reset"]
)->name("slots.reset");

Route::put(
    "/devices/{device}/location",
    [DeviceController::class, "updateLocation"]
);

Route::get("/devices/{device}/cards", [
    DeviceController::class,
    "cardsNumber"
]);
