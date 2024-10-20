<?php

use Illuminate\Support\Facades\Route;

Route::middleware("can:user")
    ->prefix("user")
    ->group(function () {
        require __DIR__ . "/devices.php";
    });
