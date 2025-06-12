<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ScholarshipApiController;
use App\Http\Controllers\Api\APICampusActivityController;

Route::get('/scholarships', [ScholarshipApiController::class, 'index']);
Route::get('/scholarships/{id}', [ScholarshipApiController::class, 'show']);
Route::get('/campusactivities', [APICampusActivityController::class, 'indexapi']);