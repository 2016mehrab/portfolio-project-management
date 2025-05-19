<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Log;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projects =Project::orderBy('created_at', 'desc')->paginate(6) ;
        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image_path' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'status' => 'required|in:draft,published',
            'project_url' => 'nullable|url',
            'description' => 'nullable|string',
        ]);
        $imagePath = $request->file('image_path')->store('images','public');
        $data['image_path']=$imagePath;
        Log::info('Validated input data:', $data);
        Project::create($data);
        return redirect()->route('project.index')->with('success', 'Project created!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
        return view('project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
