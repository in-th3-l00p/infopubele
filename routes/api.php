<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post(
    "/slots/{slot}/transaction",
    [\App\Http\Controllers\SlotController::class, "transaction"]
)->name("slots.transaction");
