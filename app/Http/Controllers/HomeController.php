<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\Timeline;
use App\Models\Comment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::where('is_featured', true)
            ->latest()
            ->take(6)
            ->get();

        $projects = Project::latest()->get();
        $skills = Skill::orderBy('order', 'asc')->get();
        $timeline = Timeline::orderBy('order', 'asc')->get();
        $comments = Comment::where('is_approved', true)->latest()->take(50)->get();

        return view('home', compact('featuredProjects', 'projects', 'skills', 'timeline', 'comments'));
    }
}
