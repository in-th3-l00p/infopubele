<?php

use Illuminate\Support\Facades\Route;

Route::middleware("can:operator")
    ->prefix("operator")
    ->group(function () {
        require __DIR__ . "/devices.php";
        require __DIR__ . "/slots.php";
    });
