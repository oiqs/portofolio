<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Timeline;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('order', 'asc')->get();
        $timeline = Timeline::orderBy('order', 'asc')->get();

        return view('about', compact('skills', 'timeline'));
    }
}