<?php

namespace App\Http\Controllers\Competition;

use App\Models\Competition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CompetitionController extends Controller
{

    //Display a listing of the competitions
    public function index(Request $request)
    {
        
        $query = Competition::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%'.$request->search.'%')
                  ->orWhere('organizer', 'like', '%'.$request->search.'%');
        }

        $competitions = $query->orderBy('start_date')->get();
        return view('competitions.index', compact('competitions'));
    }


    //Show the form for creating a new competition
    public function create()
    {
        return view('competitions.create') ;
    }

    //Store a newly created competition in the database.
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'nullable|string',
            'organizer' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'link' => 'nullable|url'
        ]);

        Competition::create($request->all());

        return redirect()->route('admin.competitions.index')->with('success', 'Competition created!');
    }

    //Show the form for editing the specified competition.
    public function edit(Competition $competition)
    {
        return view('competitions.edit', compact('competition'));
    }

    public function update(Request $request, Competition $competition)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'nullable|string',
            'organizer' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'link' => 'nullable|url'
        ]);

        $competition->update($request->all());

        return redirect()->route('admin.competitions.index')->with('success', 'Updated successfully!');
    }

    //Remove the specified competition from the database.
    public function destroy(Competition $competition)
    {
        $competition->delete();
        return redirect()->route('admin.competitions.index')->with('success', 'Deleted successfully!');
    }
    public function show(Competition $competition)
    {
        return view('competitions.show', compact('competition'));
    }
}
