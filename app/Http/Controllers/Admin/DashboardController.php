<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Timeline;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProjects = Project::count();
        $totalSkills = Skill::count();
        $totalTimelines = Timeline::count();
        $totalMessages = Contact::count();
        $unreadMessages = Contact::where('is_read', false)->count();

        $recentProjects = Project::latest()->take(5)->get();
        $recentMessages = Contact::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalProjects',
            'totalSkills',
            'totalTimelines',
            'totalMessages',
            'unreadMessages',
            'recentProjects',
            'recentMessages'
        ));
    }
}
