<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/logout', function () {
    session()->flush();
    return redirect("/");
});

Route::resource("/submit-assessment", AssessmentController::class);
Route::resource("/admin", AdminController::class);
Route::get("/login", [LoginController::class, 'index']);
Route::post("/login", [LoginController::class, 'store']);
