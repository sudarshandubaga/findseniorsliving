<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('web.screens.home');
})->name('home');

Route::get('/listings', [App\Http\Controllers\ListingController::class, 'index'])->name('listings.index');
Route::get('/listings/{state}', [App\Http\Controllers\ListingController::class, 'index'])->name('listings.state');
Route::get('/listings/{state}/{city}', [App\Http\Controllers\ListingController::class, 'index'])->name('listings.city');
