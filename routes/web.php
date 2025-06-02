<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Internship\InternshipController;

use App\Http\Controllers\Student\ScholarshipController;


Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::middleware('guest')->group(function () {
    // Login routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    
    // Register routes
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    
});

Route::middleware(['auth'])->group(function () {

    // Student routes
    Route::prefix('student')->name('student.')->group(function () {
        Route::get('/internships', [InternshipController::class, 'showInternshipPage'])->name('internships');
        Route::get('/internships', [InternshipController::class, 'showInternshipPage'])->name('internships.create');

    });
    
    // Admin routes
    Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {

    });
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});