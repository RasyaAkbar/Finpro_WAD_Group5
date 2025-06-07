<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ScholarshipInformation;
use Illuminate\Http\JsonResponse;

class ScholarshipApiController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(ScholarshipInformation::all());
    }

    public function show($id)
    {
        $scholarship = ScholarshipInformation::findOrFail($id);
        return response()->json($scholarship);
    }
}
