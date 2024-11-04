<?php

use App\Http\Controllers\API\Auth\ApiAnnouncementController;
use App\Http\Controllers\API\Auth\ApiGuardianRegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\ApiLoginController;
use App\Http\Controllers\API\Auth\ApiStudentRegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [ApiLoginController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [ApiLoginController::class, 'logout']);
Route::post('register/student', [ApiStudentRegisterController::class, 'register']);
Route::post('register/guardian', [ApiGuardianRegisterController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/announcements', [ApiAnnouncementController::class, 'index']);
    Route::get('/recent-announcement', [ApiAnnouncementController::class, 'getRecentAnnouncement']);
});