<?php

use App\Http\Controllers\MusicController;
use Illuminate\Support\Facades\Route;

Route::get("/", [MusicController::class,"welcome"])->name("welcome");

Route::get("/create", [MusicController::class,"createMusic"])->name("createMusic");

Route::post("/store",[MusicController::class, "store"])->name("store");

Route::get(("/edit/{id}"), [MusicController::class, "editMusic"])->name('editMusic');

Route::patch(("/update/{id}"), [MusicController::class,"updateMusic"])->name('updateMusic');

Route::delete(("/delete/{id}"), [MusicController::class,"deleteMusic"])->name('deleteMusic');
