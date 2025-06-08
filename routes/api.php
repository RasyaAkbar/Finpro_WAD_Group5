<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\APICampusActivityController;
use App\Http\Controllers\Api\APIInternshipController;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/campusactivities', [APICampusActivityController::class, 'indexapi']);


Route::get('/internship', [APIInternshipController::class, 'index']);
Route::post('/internship', [APIInternshipController::class, 'store']);
Route::get('/internship/{id}', [APIInternshipController::class, 'show']);
Route::put('/internship/{id}', [APIInternshipController::class, 'update']);
Route::delete('/internship/{id}', [APIInternshipController::class, 'destroy']);