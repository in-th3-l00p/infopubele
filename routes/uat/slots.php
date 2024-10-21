<?php

use App\Http\Controllers\Uat\SlotController;
use Illuminate\Support\Facades\Route;

Route::resource(
    "devices.slots",
    SlotController::class,
    ["as" => "uat"]
)
    ->except(["index", "store", "edit", "update"])
    ->middleware("auth");
