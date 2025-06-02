<?php

namespace App\Http\Controllers;

use App\Models\ScholarshipInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ScholarshipInformationController extends Controller
{
    public function index(Request $request)
    {
        $query = ScholarshipInformation::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $scholarships = $query->orderBy('deadline', 'asc')->paginate(9);

        return view('scholarships.index', compact('scholarships'));
    }

    public function create()
    {
        return view('scholarships.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|min:30',
                'eligibility' => 'required|string|max:255',
                'deadline' => 'nullable|date|after:today',
                'category' => 'required|string|in:Undergraduate,Graduate,International,Other',
                'urgency' => 'required|in:low,medium,high',
                'attachment' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            ]);

            if ($request->hasFile('attachment')) {
                $path = $request->file('attachment')->store('scholarship_files', 'public');
                $validatedData['attachment'] = $path;
            }

            ScholarshipInformation::create($validatedData);

            return redirect()->route('scholarships.index')->with('success', 'Scholarship information added successfully!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function show(ScholarshipInformation $scholarship)
    {
        return view('scholarships.show', compact('scholarship'));
    }

    public function edit(ScholarshipInformation $scholarship)
    {
        return view('scholarships.edit', compact('scholarship'));
    }

    public function update(Request $request, ScholarshipInformation $scholarship)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|min:30',
                'eligibility' => 'required|string|max:255',
                'deadline' => 'nullable|date|after:today',
                'category' => 'required|string|in:Undergraduate,Graduate,International,Other',
                'urgency' => 'required|in:low,medium,high',
                'attachment' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            ]);

            if ($request->hasFile('attachment')) {
                // Delete old file if exists
                if ($scholarship->attachment) {
                    Storage::disk('public')->delete($scholarship->attachment);
                }

                $path = $request->file('attachment')->store('scholarship_files', 'public');
                $validatedData['attachment'] = $path;
            }

            $scholarship->update($validatedData);

            return redirect()->route('scholarships.index')->with('success', 'Scholarship information updated successfully!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function destroy(ScholarshipInformation $scholarship)
    {
        // Delete attachment file
        if ($scholarship->attachment) {
            Storage::disk('public')->delete($scholarship->attachment);
        }

        $scholarship->delete();
        return redirect()->route('scholarships.index')->with('success', 'Scholarship information deleted successfully!');
    }

    public function apiIndex()
    {
        $scholarships = ScholarshipInformation::all();
        return response()->json($scholarships);
    }

    public function apiShow(ScholarshipInformation $scholarship)
    {
        return response()->json($scholarship);
    }
}
