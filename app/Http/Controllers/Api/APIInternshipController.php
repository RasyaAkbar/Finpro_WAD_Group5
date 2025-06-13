<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


use App\Models\Internship;
use App\Http\Resources\APIResource;


class APIInternshipController extends Controller
{
    public function index()
    {
        $internships = Internship::all();
        return new APIResource(true, 'List of Internship Data', $internships);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'company_name' => 'required',
            'description' => 'required',
            'requirements' => 'required',
            'deadline' => 'required|after:today',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $internships = Internship::create($request->all());
        return new APIResource(true, 'Internship Data Successfully Added!', $internships);
    }

    public function show($id)
    {
        $internship = Internship::find($id);
        if (!$internship) {
            return response()->json(['message' => 'Internship not found'], 404);
        }
        return new APIResource(true, 'Internship Details!', $internship);
    }

    public function update(Request $request, $id)
    {
        $internship = Internship::find($id);

        if (!$internship) {
            return response()->json(['message' => 'Internship not found'], 404);
        }
        $validator = Validator::make($request->all(), [
            'title' => 'sometimes',
            'company_name' => 'sometimes',
            'description' => 'sometimes',
            'requirements' => 'sometimes',
            'deadline' => 'sometimes|after:today',
        ]);

        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $internship->update($request->all());

        return new APIResource(true, 'Internship Data Successfully Updated!', $internship);
    }

    public function destroy($id)
    {
        $internships = Internship::find($id);

        if (!$internships) {
            return response()->json(['message' => 'Internship not found'], 404);
        }
        $internships->delete();

        return new APIResource(true, 'Internship Data Successfully Deleted!', null);
    }
}
