<?php

namespace App\Http\Controllers\Site;

use App\Models\Principle;
use App\Models\Technology;
use App\Http\Controllers\Controller;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::latest()->get();
        $principles = Principle::latest()->get();
        return view('site.technology.index', compact('technologies', 'principles'));
    }
}
