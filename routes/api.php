<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ScholarshipApiController;

Route::get('/scholarships', [ScholarshipApiController::class, 'index']);
Route::get('/scholarships/{id}', [ScholarshipApiController::class, 'show']);
