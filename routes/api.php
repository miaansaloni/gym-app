<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.v1.')
    ->prefix('v1')     
    ->group(function () {
        Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
        Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
        // Route::resource('/courses', CourseController::class);
        Route::get('/userdashboard', [UserController::class, 'userdashboard'])->name('user.userdashboard');
        Route::get('/admindashboard', [UserController::class, 'admindashboard'])->name('admin.admindashboard');
    });
