<?php

namespace App\Http\Controllers;

use App\Models\CampusActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampusActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all activities ordered by start_date ascending
        $activities = CampusActivity::orderBy('start_date', 'asc')->get();

        // Return the student view with actual data
        return view('campus_activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        // Show form to create new activity
        return view('campus_activities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'location' => 'required|string|max:255',
            'time' => 'required|string',
            'category' => 'nullable|string',
            'organizer' => 'nullable|string|max:255',
            'status' => 'nullable|string',    
        ]);

        $activityData = $request->only([
            'title',
            'description',
            'start_date',
            'location',
            'time',
            'category',
            'organizer',
        ]);

        $activityData['status'] = 'active';
        // Create new activity record
        CampusActivity::create($activityData);

        // Redirect to student campus activities index with success message
        return redirect()->route('student.campus-activities')->with('success', 'Campus Activity created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $campusActivity = CampusActivity::findOrFail($id);
        return view('campus_activities.show', compact('campusActivity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $activity = CampusActivity::findOrFail($id);
        // Show edit form with existing data
        return view('campus_activities.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campusActivity = CampusActivity::findOrFail($id);
        
        // Validate request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'location' => 'required|string|max:255', // Changed from nullable to required to match your form
            'time' => 'required|string', // Changed from nullable to required to match your form
            'category' => 'nullable|string',
            'organizer' => 'nullable|string|max:255',
            'status' => 'nullable|string', // Added status validation
        ]);

        // Update the activity record - use only the validated fields
        $campusActivity->update($request->only([
            'title',
            'description',
            'start_date',
            'end_date',
            'location',
            'time',
            'category',
            'organizer',
            'status'
        ]));

        // FIXED: Redirect to campus activities list instead of edit page
        return redirect()->route('student.campus-activities')->with('success', 'Campus Activity updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $campusActivity = CampusActivity::findOrFail($id);
        
        // Delete the activity
        $campusActivity->delete();

        // Redirect back with success message
        return redirect()->route('student.campus-activities')->with('success', 'Campus Activity deleted successfully!');
    }

    // API Methods for Postman testing
    
    /**
     * API: Get all activities
     */
    public function apiIndex()
    {
        $activities = CampusActivity::orderBy('start_date', 'asc')->get();
        return response()->json([
            'success' => true,
            'data' => $activities
        ]);
    }

    /**
     * API: Store new activity
     */
    public function apiStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'location' => 'nullable|string|max:255',
            'time' => 'nullable|string',
            'category' => 'nullable|string',
        ]);

        $activity = CampusActivity::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Campus Activity created successfully!',
            'data' => $activity
        ], 201);
    }

    /**
     * API: Get single activity
     */
    public function apiShow($id)
    {
        $activity = CampusActivity::find($id);
        
        if (!$activity) {
            return response()->json([
                'success' => false,
                'message' => 'Activity not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $activity
        ]);
    }

    /**
     * API: Update activity
     */
    public function apiUpdate(Request $request, $id)
    {
        $activity = CampusActivity::find($id);
        
        if (!$activity) {
            return response()->json([
                'success' => false,
                'message' => 'Activity not found'
            ], 404);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'location' => 'nullable|string|max:255',
            'time' => 'nullable|string',
            'category' => 'nullable|string',
        ]);

        $activity->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Campus Activity updated successfully!',
            'data' => $activity
        ]);
    }

    /**
     * API: Delete activity
     */
    public function apiDestroy($id)
    {
        $activity = CampusActivity::find($id);
        
        if (!$activity) {
            return response()->json([
                'success' => false,
                'message' => 'Activity not found'
            ], 404);
        }

        $activity->delete();

        return response()->json([
            'success' => true,
            'message' => 'Campus Activity deleted successfully!'
        ]);
    }
}