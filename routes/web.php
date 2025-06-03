<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Internship\InternshipController;

use App\Http\Controllers\Student\ScholarshipController;
use App\Http\Controllers\Culinary\CulinaryController;

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
        Route::get('/internships/create', [InternshipController::class, 'createInternshipPage'])->name('internships.create');
        Route::get('/internships/{internship}', [InternshipController::class, 'showDetailInternshipPage'])->name('internships.show');
        Route::get('/internships/{internship}/edit', [InternshipController::class, 'editInternshipPage'])->name('internships.edit');
        Route::put('/internships/{internship}/edit', [InternshipController::class, 'update'])->name('internships.update');
        Route::delete('/internships/{internship}', [InternshipController::class, 'destroy'])->name('internships.destroy');
        Route::post('/internships/', [InternshipController::class, 'store'])->name('internships.store');
        #Route::get('/culinary', [CulinaryController::class, 'showCulinary'])->name('culinary');
    });

    Route::prefix('cul')->group(function(){
        Route::get('/culinary',[CulinaryController::class,'index'])->name('culinaryAdmin.indexCulinary');
        Route::get('/culinary/create',[CulinaryController::class,'create'])->name('culinaryAdmin.createCulinary');
        Route::post('/culinary',[CulinaryController::class,'store'])->name('culinaryAdmin.storeCulinary');
        Route::get('/culinary/{culinar}/edit',[CulinaryController::class,'edit'])->name('culinaryAdmin.editCulinary');
        Route::put('/culinary/{culinar}',[CulinaryController::class,'update'])->name('culinaryAdmin.updateCulinary');
        Route::delete('/culinary/{culinar}',[CulinaryController::class,'destroy'])->name('culinaryAdmin.destroyCulinary');
 
    });
    
    // Admin routes
    Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {

    });
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});