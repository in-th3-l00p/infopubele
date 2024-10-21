<?php

use App\Http\Controllers\Operator\SlotController;
use Illuminate\Support\Facades\Route;

Route::resource(
    "devices.slots",
    SlotController::class,
    ["as" => "operator"]
)
    ->except(["index", "store", "edit", "update"])
    ->middleware("auth");
