<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Competition; 
use App\Http\Resources\APIResource; 

class APICompetitionController extends Controller
{
    // Display a listing of the competitions
    public function index()
    {
        $competitions = Competition::all(); // Fetch all competitions
        return new APIResource(true, 'List of Competitions', $competitions);
    }

    // Store a newly created competition in the database
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'category' => 'nullable|string',
            'organizer' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'link' => 'nullable|url'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $competition = Competition::create($request->all()); // Store new competition

        return new APIResource(true, 'Competition Successfully Added!', $competition);
    }

    // Display the specified competition
    public function show($id)
    {
        $competition = Competition::find($id); // Find a specific competition

        if (!$competition) {
            return response()->json(['message' => 'Competition not found'], 404);
        }

        return new APIResource(true, 'Competition Details', $competition);
    }

    // Update the specified competition in the database
    public function update(Request $request, $id)
    {
        $competition = Competition::find($id); // Find the competition to update

        if (!$competition) {
            return response()->json(['message' => 'Competition not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'sometimes',
            'description' => 'sometimes',
            'category' => 'nullable|string',
            'organizer' => 'nullable|string|max:255',
            'start_date' => 'sometimes|date',
            'end_date' => 'sometimes|date|after_or_equal:start_date',
            'link' => 'nullable|url'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $competition->update($request->all()); // Update competition data

        return new APIResource(true, 'Competition Successfully Updated!', $competition);
    }

    // Remove the specified competition from the database
    public function destroy($id)
    {
        $competition = Competition::find($id); // Find the competition to delete

        if (!$competition) {
            return response()->json(['message' => 'Competition not found'], 404);
        }

        $competition->delete(); // Delete competition

        return new APIResource(true, 'Competition Successfully Deleted!', null);
    }
}
