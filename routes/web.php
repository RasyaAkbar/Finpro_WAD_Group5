<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Internship\InternshipController;

use App\Http\Controllers\Student\ScholarshipController;

use App\Http\Controllers\competition\CompetitionController;
use App\Http\Controllers\CampusActivityController;



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

    // Show all competitions
    Route::get('/competitions', [CompetitionController::class, 'index'])->name('competitions.index');

    // Show the form to create a new competition
    Route::get('/competitions/create', [CompetitionController::class, 'create'])->name('competition.create');

    // Show a single competition by ID
    Route::get('/competitions/{competition}', [CompetitionController::class, 'show'])->name('competitions.show');

    // Student routes
    Route::prefix('student')->name('student.')->group(function () {
        Route::get('/internships', [InternshipController::class, 'showInternshipPage'])->name('internships');


        Route::get('/internships/create', [InternshipController::class, 'createInternshipPage'])->name('internships.create');
        Route::get('/internships/{internship}', [InternshipController::class, 'showDetailInternshipPage'])->name('internships.show');
        Route::get('/internships/{internship}/edit', [InternshipController::class, 'editInternshipPage'])->name('internships.edit');
        Route::put('/internships/{internship}/edit', [InternshipController::class, 'update'])->name('internships.update');
        Route::delete('/internships/{internship}', [InternshipController::class, 'destroy'])->name('internships.destroy');
        Route::post('/internships/', [InternshipController::class, 'store'])->name('internships.store');



        Route::get('/campus-activities', [CampusActivityController::class, 'index'])->name('campus-activities');
        Route::get('/campus-activities/create', [CampusActivityController::class, 'create'])->name('campus-activities-create');
        Route::post('/campus-activities/store', [CampusActivityController::class, 'store'])->name('campus-activities-store');
        Route::get('/campus-activities/{id}/edit', [CampusActivityController::class, 'edit'])->name('campus-activities-edit');
        Route::put('/campus-activities/{id}', [CampusActivityController::class, 'update'])->name('campus-activities-update');
        Route::delete('/campus-activities/{id}', [CampusActivityController::class, 'destroy'])->name('campus-activities-destroy');
    });
    
    // Admin routes
    Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {

    // Competitions routes
        // Show the list of competitions routes (admin view)
        Route::get('/competitions', [CompetitionController::class, 'index'])->name('competitions.index');
        Route::get('/competitions/{competition}/edit', [CompetitionController::class, 'edit'])->name('competitions.edit');
        Route::put('/competitions/{competition}', [CompetitionController::class, 'update'])->name('competitions.update');
        Route::delete('/competitions/{competition}', [CompetitionController::class, 'destroy'])->name('competitions.destroy');
        Route::get('/competitions/{competition}', [CompetitionController::class, 'show'])->name('competitions.show');
        Route::post('/competitions', [CompetitionController::class, 'store'])->name('competitions.store');


        
    });
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// API routes for search functionality
Route::middleware('auth:sanctum')->prefix('api')->group(function () {
    
  Route::get('/campus-activities', [CampusActivityController::class, 'apiIndex']);
    Route::post('/campus-activities', [CampusActivityController::class, 'apiStore']);
    Route::get('/campus-activities/{id}', [CampusActivityController::class, 'apiShow']);
    Route::put('/campus-activities/{id}', [CampusActivityController::class, 'apiUpdate']);
    Route::delete('/campus-activities/{id}', [CampusActivityController::class, 'apiDestroy']);
});