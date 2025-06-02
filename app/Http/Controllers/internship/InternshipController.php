<?php

namespace App\Http\Controllers\Internship;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InternshipController extends Controller
{

    public function showInternshipPage()
    {
        
        return view('internship.internship-view');
    }

    public function createInternshipPage()
    {
        
        return view('internship.');
    }
}