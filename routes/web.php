<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\GalleryController;

/*
|--------------------------------------------------------------------------
| 🌐 Public Website Routes
|--------------------------------------------------------------------------
*/

Route::get('/', fn () => view('welcome'));

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServicesController::class, 'index'])->name('services');

// Public views for content
Route::get('/events', [EventController::class, 'showPublicEvents'])->name('events');
Route::get('/members', [MemberController::class, 'showPublicMembers'])->name('members');
Route::get('/gallery', [GalleryController::class, 'showPublicGallery'])->name('gallery');

// ✅ Contact — NOW PUBLIC (no auth required)
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| 🔐 Authenticated Dashboard Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {
    // Dashboard Home
    Route::get('/', fn () => view('dashboard.home'))->name('dashboard');

    // Admin - Events
    Route::resource('events', EventController::class)
        ->names([
            'index'   => 'dashboard.events.index',
            'create'  => 'dashboard.events.create',
            'store'   => 'dashboard.events.store',
            'edit'    => 'dashboard.events.edit',
            'update'  => 'dashboard.events.update',
            'destroy' => 'dashboard.events.destroy',
        ])
        ->except(['show']);

    // Admin - Members
    Route::resource('members', MemberController::class)
        ->names([
            'index'   => 'dashboard.members.index',
            'create'  => 'dashboard.members.create',
            'store'   => 'dashboard.members.store',
            'edit'    => 'dashboard.members.edit',
            'update'  => 'dashboard.members.update',
            'destroy' => 'dashboard.members.destroy',
        ])
        ->except(['show']);

    // Admin - Gallery
    Route::resource('gallery', GalleryController::class)
        ->names([
            'index'   => 'dashboard.gallery.index',
            'create'  => 'dashboard.gallery.create',
            'store'   => 'dashboard.gallery.store',
            'edit'    => 'dashboard.gallery.edit',
            'update'  => 'dashboard.gallery.update',
            'destroy' => 'dashboard.gallery.destroy',
        ])
        ->except(['show']);
});

/*
|--------------------------------------------------------------------------
| 👤 User Profile Routes (Breeze)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Breeze Auth Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
