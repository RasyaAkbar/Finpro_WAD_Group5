<?php

namespace App\Http\Controllers\Culinary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Culinary; 
use Illuminate\Support\Facades\Storage;

class CulinaryController extends Controller
{
    /*public function showCulinary()
    {
        $culinaries = Culinary::latest()->get();
        return view("culinary.culinary",compact('culinaries'));
    }*/

    public function index() {
        $culinaries = Culinary::all();
        return view('culinaryAdmin.indexCulinary', compact('culinaries'));
    }

    public function create() {
        return view('culinaryAdmin.createCulinary');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg'
        ]);

        $culinaryData = $request->only('title','detail');

        if ($request->hasfile('image')) {
            $imagePath = $request->file('image')->store('culinaries','public');
            $culinaryData['image'] = $imagePath;
        }

        auth()->user()->culinary()->create($culinaryData);

        session()->flash('success','Culinary view created');

        return redirect()->route('culinaryAdmin.indexCulinary');
    }

    public function edit(Culinary $culinary){
            return view('culinaryAdmin.editCulinary', compact('culinaries'));
        }
    
    public function update(Request $request, Culinary $culinary)
    {
        $request->validate([
            'title' => 'required',
            'detail'=> 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg'
        ]);

        $culinaryData = $request->only('title','detail');

        if ($request->hasFile('image')) {
            if ($culinary->image) {
                Storage::delete('public/' . $culinary->image);
            }

            $imagePath = $request->file('image')->store('culinary','public');
            $culinaryData['image'] = $imagePath;
        }

        $culinary->update($culinaryData);

        session()->flash('success','Culinary renewed');

        return redirect()->route('culinaryAdmin.indexCulinary');
    }

    public function destroy(Culinary $culinary) {
        $culinary->delete();
        session()->flash('success','article deleted');
        return redirect()->route('culinaryAdmin.indexCulinary');
    }
    
    
}
