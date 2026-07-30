<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Timeline;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function index()
    {
        $timelines = Timeline::orderBy('order', 'asc')->get();
        return view('admin.timelines.index', compact('timelines'));
    }

    public function create()
    {
        return view('admin.timelines.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'required|integer',
        ]);

        Timeline::create($validated);

        return redirect()->route('admin.timelines.index')->with('success', 'Jejak Perjalanan / Timeline berhasil ditambahkan!');
    }

    public function edit(Timeline $timeline)
    {
        return view('admin.timelines.edit', compact('timeline'));
    }

    public function update(Request $request, Timeline $timeline)
    {
        $validated = $request->validate([
            'year' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'required|integer',
        ]);

        $timeline->update($validated);

        return redirect()->route('admin.timelines.index')->with('success', 'Jejak Perjalanan / Timeline berhasil diperbarui!');
    }

    public function destroy(Timeline $timeline)
    {
        $timeline->delete();

        return redirect()->route('admin.timelines.index')->with('success', 'Jejak Perjalanan / Timeline berhasil dihapus!');
    }
}
