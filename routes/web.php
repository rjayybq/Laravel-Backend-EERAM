<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

Auth::routes();

Route::get('auth/home', [App\Http\Controllers\Auth\HomeController::class, 'index'])->name('auth.home')->middleware('isAdmin');
Route::get('user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');

Route::get('auth/announcements', [AnnouncementController::class, 'index'])->name('auth.announcements.index');
Route::post('auth/announcements', [AnnouncementController::class, 'store'])->name('auth.announcements.store');

Route::get('auth/announcements/create', [AnnouncementController::class, 'create'])
    ->name('auth.announcements.create')
    ->middleware('isAdmin');
Route::get('auth/announcements/{id}/edit', [AnnouncementController::class, 'edit'])
    ->name('auth.announcements.edit')
    ->middleware('isAdmin');
    Route::put('/admin/announcements/{id}', [AnnouncementController::class, 'update'])
    ->name('auth.announcements.update')
    ->middleware('isAdmin');
Route::delete('/admin/announcements/{id}', [AnnouncementController::class, 'destroy'])
    ->name('auth.announcements.destroy')
    ->middleware('isAdmin');