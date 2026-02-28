<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ElderlyLawyerController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/senior-care/{country?}/{state?}/{city?}', [ListingController::class, 'index'])->name('listings.index');
Route::get('/elderly-lawyers/{country?}/{state?}/{city?}', [ElderlyLawyerController::class, 'index'])->name('lawyers.index');
