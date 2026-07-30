<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();

        return view('projects.index', compact('projects'));
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        $allProjects = Project::latest()->get();
        $currentIndex = $allProjects->search(fn($p) => $p->id === $project->id);

        $next = $allProjects[($currentIndex + 1) % $allProjects->count()];

        return view('projects.show', compact('project', 'next'));
    }
}