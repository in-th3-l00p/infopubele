<?php

use Illuminate\Support\Facades\Route;

Route::middleware("can:generator")
    ->prefix("generator")
    ->group(function () {
        require __DIR__ . "/devices.php";
    });
