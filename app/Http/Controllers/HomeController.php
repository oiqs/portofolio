<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::where('is_featured', true)
            ->latest()
            ->take(6)
            ->get();

        return view('home', compact('featuredProjects'));
    }
}