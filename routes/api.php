<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ActivityController;
use App\Http\Controllers\Api\SlotController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\CourseController;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.v1.')
    ->prefix('v1')
    ->group(function () {
    // User routes
    Route::get('/user-dashboard', [UserController::class, 'userDashboard']);
    Route::post('/book-course/{courseId}', [UserController::class, 'bookCourse']);
    Route::delete('/delete-booking/{courseId}', [UserController::class, 'deleteBooking']);

    // Admin routes
    Route::get('/admin-dashboard', [AdminController::class, 'adminDashboard']);
    Route::patch('/update-booking-status/{courseId}/{userId}', [AdminController::class, 'updateBookingStatus']);
    Route::post('/admin-accept/{userId}/{courseId}', [AdminController::class, 'adminAccept']);
    Route::post('/admin-reject/{userId}/{courseId}', [AdminController::class, 'adminReject']);

    // Activity routes
    Route::get('/activities', [ActivityController::class, 'index']);
    Route::post('/activities', [ActivityController::class, 'store']);
    Route::get('/activities/{id}', [ActivityController::class, 'show']);
    Route::put('/activities/{id}', [ActivityController::class, 'update']);
    Route::delete('/activities/{id}', [ActivityController::class, 'destroy']);

    // Course routes
    // Route::resource('/courses', CourseController::class);
    Route::get('/courses', [CourseController::class, 'index']);
    Route::post('/courses', [CourseController::class, 'store']);
    Route::get('/courses/{id}', [CourseController::class, 'show']);
    Route::put('/courses/{id}', [CourseController::class, 'update']);
    Route::delete('/courses/{id}', [CourseController::class, 'destroy']);

    // Slot routes
    Route::get('/slots', [SlotController::class, 'index']);
    Route::post('/slots', [SlotController::class, 'store']);
    Route::get('/slots/{id}', [SlotController::class, 'show']);
    Route::put('/slots/{id}', [SlotController::class, 'update']);
    Route::delete('/slots/{id}', [SlotController::class, 'destroy']);
    });
