<?php

use App\Http\Controllers\ScholarshipInformationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Internship\InternshipController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;

// Home page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated user profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

// Student routes (authenticated)
Route::middleware(['auth'])->prefix('student')->name('student.')->group(function () {
    Route::get('/campus-activities', [DashboardController::class, 'campusActivities'])->name('campus-activities');
    Route::get('/internships', [InternshipController::class, 'showInternshipPage'])->name('internships');
    Route::get('/local-culinary', [DashboardController::class, 'localCulinary'])->name('local-culinary');
    Route::get('/competitions', [DashboardController::class, 'competitions'])->name('competitions');
    Route::get('/search', [DashboardController::class, 'search'])->name('search');
});

// Admin-only routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard');
    Route::get('/manage-scholarships', [DashboardController::class, 'manageScholarships'])->name('manage-scholarships');
    Route::get('/manage-activities', [DashboardController::class, 'manageActivities'])->name('manage-activities');
    Route::get('/manage-internships', [DashboardController::class, 'manageInternships'])->name('manage-internships');
    Route::get('/manage-culinary', [DashboardController::class, 'manageCulinary'])->name('manage-culinary');
    Route::get('/manage-competitions', [DashboardController::class, 'manageCompetitions'])->name('manage-competitions');
    
    // Full CRUD for scholarships (admin only)
    Route::resource('scholarships', ScholarshipInformationController::class)->except(['index', 'show']);
});

// Public scholarship routes (accessible to all)
Route::resource('scholarships', ScholarshipInformationController::class)->only(['index', 'show']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');