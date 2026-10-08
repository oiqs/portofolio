<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LanguageController;

// Admin Controllers
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\SkillController as AdminSkillController;
use App\Http\Controllers\Admin\TimelineController as AdminTimelineController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Language Switcher
Route::get('/lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');

/*
|--------------------------------------------------------------------------
| Admin Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->middleware('throttle:5,1')->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Protected Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Projects CRUD
    Route::resource('projects', AdminProjectController::class)->except(['show']);
    
    // Skills / Hobi CRUD
    Route::resource('skills', AdminSkillController::class)->except(['show']);
    
    // Timeline / Jejak Perjalanan CRUD
    Route::resource('timelines', AdminTimelineController::class)->except(['show']);
    
    // Contact Inbox
    Route::get('messages', [AdminContactController::class, 'index'])->name('messages.index');
    Route::get('messages/{message}', [AdminContactController::class, 'show'])->name('messages.show');
    Route::post('messages/{message}/reply', [AdminContactController::class, 'reply'])->name('messages.reply');
    Route::delete('messages/{message}', [AdminContactController::class, 'destroy'])->name('messages.destroy');
});