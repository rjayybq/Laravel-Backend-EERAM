<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\HomeController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\AnnouncementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('auth/home', [HomeController::class, 'index'])->name('auth.home')->middleware('isAdmin');
// Route::get('user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('auth/announcements', [AnnouncementController::class, 'index'])->name('auth.announcements.index');
    Route::post('auth/announcements', [AnnouncementController::class, 'store'])->name('auth.announcements.store');
    Route::get('auth/announcements/create', [AnnouncementController::class, 'create'])->name('auth.announcements.create');
    Route::get('auth/announcements/{id}/edit', [AnnouncementController::class, 'edit'])->name('auth.announcements.edit');
    Route::put('auth/announcements/{id}', [AnnouncementController::class, 'update'])->name('auth.announcements.update');
    Route::delete('auth/announcements/{id}', [AnnouncementController::class, 'destroy'])->name('auth.announcements.destroy');
    
    
    Route::get('auth/unverified-users', [AdminController::class, 'showUnverifiedUsers'])->name('auth.unverified-users');
    Route::post('auth/verify-user/{role}/{id}', [AdminController::class, 'verifyUser'])->name('auth.verify-user');
});
