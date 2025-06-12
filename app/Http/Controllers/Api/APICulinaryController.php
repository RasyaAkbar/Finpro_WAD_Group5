<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


use App\Models\Culinary;
use App\Http\Resources\APIResource;

class APICulinaryController extends Controller
{
    public function index()
    {
        $culinaries = Culinary::all();
        return new APIResource(true, 'List of Culinary Data', $culinaries);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
        ]);

        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $culinaryData = Culinary::create($request->all());

        return new APIResource(true, 'Culinary Data Successfully Added!', $culinaryData);
    }

    public function show($id)
    {

        $culinary = Culinary::find($id);

        if (!$culinary) {
            return response()->json(['message' => 'Culinary not found'], 404);
        }

        return new APIResource(true, 'Internship Details!', $culinary);
    }

    public function update(Request $request, $id)
    {
        $culinary = Culinary::find($id);

        
        if (!$culinary) {
            return response()->json(['message' => 'Culinary not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required',
            'content' => 'sometimes|required',
        ]);

        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $culinary->update($request->all());

        
        return new APIResource(true, 'Internship Data Successfully Updated!', $culinary);
    }

    public function destroy($id)
    {
        $culinary = Internship::find($id);

        if (!$culinary) {
            return response()->json(['message' => 'Culinary not found'], 404);
        }

        
        $culinary->delete();

        return new APIResource(true, 'Culinary Data Successfully Deleted!', null);
    }
}
