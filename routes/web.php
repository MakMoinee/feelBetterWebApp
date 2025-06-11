<?php

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("/submit-assessment", AssessmentController::class);
