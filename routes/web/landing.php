<?php

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::view("/", "welcome")->name("welcome");
Route::view("/about", "about")->name("about");
Route::view("/contact", "contact")->name("contact");
Route::post("/contact", function (ContactRequest $request) {
    $request->validate([
        "nume" => "required|string|max:255",
        "prenume" => "required|string|max:255",
        "email" => "required|email",
        "numar-de-telefon" => "required|string|max:255",
        "mesaj" => "required|string|max:1000"
    ]);
    $contact= Contact::create($request->validated());

    return redirect()
        ->route("contact",["contact"=>$contact->id])
        ->with("success", "Mesajul a fost trimis cu succes!");
})->name("contact.store");


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get("/dashboard", function (Request $request) {
        switch ($request->user()->role) {
            case "admin":
                return redirect()->route("admin.dashboard");
            case "user":
                return redirect()->route("user.dashboard");
            case "uat":
                return redirect()->route("uat.dashboard");
            case "generator":
                return redirect()->route("generator.dashboard");
            case "operator":
                return redirect()->route("operator.dashboard");
        }
        return redirect()->route("user.dashboard");
    })
        ->name("dashboard");
});
