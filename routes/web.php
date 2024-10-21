<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        switch (request()->user()->role) {
            case "admin":
                return redirect()->route('admin.devices.index');
            case "uat":
                return redirect()->route('uat.devices.index');
            case "generator":
                return redirect()->route('generator.device-reports.index');
            case "operator":
                return redirect()->route('operator.devices.index');
            case "user":
                return redirect()->route('user.devices.show');
        }
        return redirect()->route('welcome');
    })->name('dashboard');

    require __DIR__ . "/admin/web.php";
    require __DIR__ . "/uat/web.php";
    require __DIR__ . "/generator/web.php";
    require __DIR__ . "/operator/web.php";
    require __DIR__ . "/user/web.php";
});
