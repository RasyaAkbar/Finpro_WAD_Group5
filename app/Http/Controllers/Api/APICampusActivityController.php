<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CampusActivity;
use App\Http\Resources\CampusActivityResource;

class APICampusActivityController extends Controller
{
    public function indexapi()
    {
        $activities = CampusActivity::latest()->paginate(5); 

        return new CampusActivityResource(true, 'Campus activities retrieved successfully', $activities);
    }
}
