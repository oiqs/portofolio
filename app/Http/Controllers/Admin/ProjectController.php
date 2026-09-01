<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug',
            'description' => 'required|string',
            'year' => 'required|string|max:20',
            'role' => 'required|string|max:100',
            'stack' => 'required|string',
            'problem' => 'nullable|string',
            'solution' => 'nullable|string',
            'impact' => 'nullable|string',
            'location_address' => 'nullable|string|max:500',
            'location_map_url' => 'nullable|string',
            'demo_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:51200', // 50MB
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,webp,gif|max:51200', // 50MB
            'is_featured' => 'nullable|boolean',
        ]);

        $validated['slug'] = $validated['slug'] ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        
        $stackArray = array_map('trim', explode(',', $validated['stack']));
        $validated['stack'] = array_values(array_filter($stackArray));

        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('projects', 'public');
            $validated['cover_image'] = $path;
        }

        if ($request->hasFile('gallery_images')) {
            $galleryPaths = [];
            foreach ($request->file('gallery_images') as $file) {
                $galleryPaths[] = $file->store('projects/gallery', 'public');
            }
            $validated['gallery_images'] = $galleryPaths;
        }

        $validated['is_featured'] = $request->has('is_featured');

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Trip / Project & Foto Traveling berhasil ditambahkan!');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug,' . $project->id,
            'description' => 'required|string',
            'year' => 'required|string|max:20',
            'role' => 'required|string|max:100',
            'stack' => 'required|string',
            'problem' => 'nullable|string',
            'solution' => 'nullable|string',
            'impact' => 'nullable|string',
            'location_address' => 'nullable|string|max:500',
            'location_map_url' => 'nullable|string',
            'demo_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:51200', // 50MB
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,webp,gif|max:51200', // 50MB
            'remove_gallery_images' => 'nullable|array',
            'is_featured' => 'nullable|boolean',
        ]);

        $validated['slug'] = $validated['slug'] ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        
        $stackArray = array_map('trim', explode(',', $validated['stack']));
        $validated['stack'] = array_values(array_filter($stackArray));

        if ($request->hasFile('cover_image')) {
            if ($project->cover_image && Storage::disk('public')->exists($project->cover_image)) {
                Storage::disk('public')->delete($project->cover_image);
            }
            $path = $request->file('cover_image')->store('projects', 'public');
            $validated['cover_image'] = $path;
        }

        $currentGallery = is_array($project->gallery_images) ? $project->gallery_images : [];

        if ($request->has('remove_gallery_images')) {
            foreach ($request->remove_gallery_images as $pathToRemove) {
                if (Storage::disk('public')->exists($pathToRemove)) {
                    Storage::disk('public')->delete($pathToRemove);
                }
                $currentGallery = array_filter($currentGallery, fn($img) => $img !== $pathToRemove);
            }
        }

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                $currentGallery[] = $file->store('projects/gallery', 'public');
            }
        }

        $validated['gallery_images'] = array_values($currentGallery);
        $validated['is_featured'] = $request->has('is_featured');

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Trip / Project & Galeri Foto berhasil diperbarui!');
    }

    public function destroy(Project $project)
    {
        if ($project->cover_image && Storage::disk('public')->exists($project->cover_image)) {
            Storage::disk('public')->delete($project->cover_image);
        }

        if (is_array($project->gallery_images)) {
            foreach ($project->gallery_images as $path) {
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
            }
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Trip / Project & seluruh foto berhasil dihapus!');
    }
}
