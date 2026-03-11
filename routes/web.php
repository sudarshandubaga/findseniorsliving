<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ElderlyLawyerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\CityDemographicsController;


use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ForgotPasswordController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/senior-care/{country?}/{state?}/{city?}', [ListingController::class, 'index'])->name('listings.index');
Route::get('/elderly-lawyers/{country?}/{state?}/{city?}', [ElderlyLawyerController::class, 'index'])->name('lawyers.index');

// Blog Frontend
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// City Demographics
Route::get('/city-demographics', [CityDemographicsController::class, 'index'])->name('city-demographics.index');
Route::get('/city-demographics/{id}', [CityDemographicsController::class, 'show'])->name('city-demographics.show');


// Admin Auth
Route::prefix('fsl-admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/captcha', [AuthController::class, 'generateCaptcha'])->name('captcha');

    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');
});

// Protected Admin Routes
Route::prefix('fsl-admin')->name('admin.')->middleware(['admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Settings
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/change-password', [ProfileController::class, 'showChangePassword'])->name('password.change');
    Route::put('/change-password', [ProfileController::class, 'changePassword'])->name('password.change.update');

    // User Management (Admin Only)
    Route::middleware(['admin.only'])->group(function () {
        Route::resource('users', UserController::class);
    });

    // Blog Posts
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::post('/posts/upload-image', [PostController::class, 'uploadCroppedImage'])->name('posts.upload-image');

    // Categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Tags
    Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
    Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
    Route::put('/tags/{tag}', [TagController::class, 'update'])->name('tags.update');
    Route::delete('/tags/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');
    Route::get('/tags/search', [TagController::class, 'search'])->name('tags.search');

    // Pages CMS
    Route::get('/pages', [PageController::class, 'index'])->name('pages.index');
    Route::get('/pages/create', [PageController::class, 'create'])->name('pages.create');
    Route::post('/pages', [PageController::class, 'store'])->name('pages.store');
    Route::get('/pages/{page}/edit', [PageController::class, 'edit'])->name('pages.edit');
    Route::put('/pages/{page}', [PageController::class, 'update'])->name('pages.update');
    Route::delete('/pages/{page}', [PageController::class, 'destroy'])->name('pages.destroy');

    // Home Page Management
    Route::resource('hero-slides', \App\Http\Controllers\Admin\HeroSlideController::class);
    Route::resource('why-choose-features', \App\Http\Controllers\Admin\WhyChooseFeatureController::class);
});
