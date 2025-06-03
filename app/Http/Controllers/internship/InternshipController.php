<?php

namespace App\Http\Controllers\Internship;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Internship;

class InternshipController extends Controller
{

    public function showInternshipPage()
    {
        $internships = Internship::latest()->get();
        return view('internship.internship-view', compact('internships'));
    }

    public function showDetailInternshipPage(Internship $internship)
    {
        return view('internship.internship-view-detail', compact('internship'));
    }

    public function createInternshipPage()
    {
        
        return view('internship.create-internship');
    }

    public function editInternshipPage(Internship $internship)
    {
        
        return view('internship.edit-internship', compact('internship'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'company_name' => 'required',
            'description' => 'required',
            'requirements' => 'required',
            'deadline' => 'required',
        ]);

        Internship::create($request->all());

        session()->flash('success', 'Internship berhasil dibuat!');
        return redirect()->route('student.internships');
    }
    public function update(Request $request, Internship $internship)
    {
        $request->validate([
            'title' => 'required',
            'company_name' => 'required',
            'description' => 'required',
            'requirements' => 'required',
            'deadline' => 'required',
        ]);

        $internship->update($request->all());

        session()->flash('success', 'Internship berhasil diedit!');
        return redirect()->route('student.internships');
    }
     
    public function destroy(Internship $internship)
    {

        $internship->delete();

        return redirect()->route('student.internships')->with('success', 'Internships deleted successfully!');
    }

}