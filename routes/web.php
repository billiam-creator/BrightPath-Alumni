<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\EventController as FrontendEventController;

// Other routes...

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('frontend.home');
Route::get('/events', [FrontendEventController::class, 'index'])->name('frontend.events.index');
Route::get('/alumni', [HomeController::class, 'alumni'])->name('alumni');
Route::get('/alumniprofile', [HomeController::class, 'alumniprofile'])->name('alumniprofile');
Route::get('/alumniregistration', [HomeController::class, 'alumniregistration'])->name('alumniregistration');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Add these new routes for the event cards
Route::get('/events/{event}/donate', [FrontendEventController::class, 'donate'])->name('donate.to.event');
Route::get('/events/{event}/join', [FrontendEventController::class, 'join'])->name('join.event');

// Dashboard routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
});

require __DIR__ . '/auth.php';