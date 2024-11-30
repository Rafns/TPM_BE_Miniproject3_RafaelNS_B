<?php

use App\Http\Controllers\MusicController;
use Illuminate\Support\Facades\Route;

Route::get("/", [MusicController::class,"welcome"])->name("welcome");

Route::get("/create", [MusicController::class,"createMusic"])->name("createMusic");

Route::post("/store",[MusicController::class, "store"])->name("store");
