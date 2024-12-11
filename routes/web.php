<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MusicController;
use Illuminate\Support\Facades\Route;

Route::get("/", [MusicController::class,"welcome"])->name("welcome");

Route::get("/create", [MusicController::class,"createMusic"])->name("createMusic")->middleware("isLogin");

Route::post("/store",[MusicController::class, "store"])->name("store");

Route::get(("/edit/{id}"), [MusicController::class, "editMusic"])->name('editMusic');

Route::patch(("/update/{id}"), [MusicController::class,"updateMusic"])->name('updateMusic');

Route::delete(("/delete/{id}"), [MusicController::class,"deleteMusic"])->name('deleteMusic');

Route::get(("/register"), [AuthController::class,"ShowRegisterForm"])->name('register');
Route::post(("/register"), [AuthController::class,"Register"])->name('registerStore');

Route::get(('/login'), [AuthController::class,'ShowLoginForm'])->name('login');
Route::post(('/login'), [AuthController::class,'Login'])->name('loginStore');

Route::post(('/logout'), [AuthController::class,'Logout'])->name('logout');
