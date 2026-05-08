<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServicesController;

// ─── Frontend Public Routes ───────────────────────────────────────────────────

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/services', [ServicesController::class, 'index'])->name('services');

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}/join',   [EventController::class, 'join'])->name('events.join');
Route::get('/events/{event}/donate', [EventController::class, 'donate'])->name('events.donate');

Route::get('/members', [MemberController::class, 'showPublicMembers'])->name('members');

Route::get('/gallery', [GalleryController::class, 'showPublicGallery'])->name('gallery');

Route::get('/contact',  [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// ─── Authenticated User Routes ────────────────────────────────────────────────

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard home
    Route::get('/dashboard', function () {
        return view('dashboard.home');
    })->name('dashboard');

    // Profile
    Route::get('/profile',    [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',  [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ─── Dashboard: Events ───────────────────────────────────────────────────
    Route::prefix('dashboard/events')->name('dashboard.events.')->group(function () {
        Route::get('/',           [EventController::class, 'dashboardIndex'])->name('index');
        Route::get('/create',     [EventController::class, 'dashboardCreate'])->name('create');
        Route::post('/',          [EventController::class, 'dashboardStore'])->name('store');
        Route::get('/{id}/edit',  [EventController::class, 'dashboardEdit'])->name('edit');
        Route::put('/{id}',       [EventController::class, 'dashboardUpdate'])->name('update');
        Route::delete('/{id}',    [EventController::class, 'dashboardDestroy'])->name('destroy');
    });

    // ─── Dashboard: Members ──────────────────────────────────────────────────
    Route::prefix('dashboard/members')->name('dashboard.members.')->group(function () {
        Route::get('/',           [MemberController::class, 'index'])->name('index');
        Route::get('/create',     [MemberController::class, 'create'])->name('create');
        Route::post('/',          [MemberController::class, 'store'])->name('store');
        Route::get('/{id}/edit',  [MemberController::class, 'edit'])->name('edit');
        Route::put('/{id}',       [MemberController::class, 'update'])->name('update');
        Route::delete('/{id}',    [MemberController::class, 'destroy'])->name('destroy');
    });

    // ─── Dashboard: Gallery ──────────────────────────────────────────────────
    Route::prefix('dashboard/gallery')->name('dashboard.gallery.')->group(function () {
        Route::get('/',           [GalleryController::class, 'index'])->name('index');
        Route::get('/create',     [GalleryController::class, 'create'])->name('create');
        Route::post('/',          [GalleryController::class, 'store'])->name('store');
        Route::get('/{id}/edit',  [GalleryController::class, 'edit'])->name('edit');
        Route::put('/{id}',       [GalleryController::class, 'update'])->name('update');
        Route::delete('/{id}',    [GalleryController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__ . '/auth.php';
