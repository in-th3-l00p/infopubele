<?php

use App\Http\Controllers\Admin\SlotController;
use Illuminate\Support\Facades\Route;

Route::resource(
    "devices.slots",
    SlotController::class,
    ["as" => "admin"]
)
    ->except(["index", "store", "edit", "update"])
    ->middleware("auth");
