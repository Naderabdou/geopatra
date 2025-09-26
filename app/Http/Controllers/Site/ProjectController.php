<?php

namespace App\Http\Controllers\Site;

use App\Models\Project;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();

        return view('site.projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('site.projects.show', compact('project'));
    }
}
