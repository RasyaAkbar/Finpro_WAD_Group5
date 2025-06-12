<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\APICampusActivityController;
use App\Http\Controllers\Api\APIInternshipController;
use App\Http\Controllers\Api\APICulinaryController;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/campusactivities', [APICampusActivityController::class, 'indexapi']);


Route::get('/internship', [APIInternshipController::class, 'index']);
Route::post('/internship', [APIInternshipController::class, 'store']);
Route::get('/internship/{id}', [APIInternshipController::class, 'show']);
Route::put('/internship/{id}', [APIInternshipController::class, 'update']);
Route::delete('/internship/{id}', [APIInternshipController::class, 'destroy']);

Route::get('/culinary',[APICulinaryController::class,'index']);
Route::post('/culinary',[APICulinaryController::class,'store']);
Route::get('/culinary/{culinary}',[APICulinaryController::class,'show']);
Route::put('/culinary/{culinary}',[APICulinaryController::class,'update']);
Route::delete('/culinary/{culinary}',[APICulinaryController::class,'destroy']);
 