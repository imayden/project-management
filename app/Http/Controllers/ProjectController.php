<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    // Get all projects
    public function index()
    {
        return Project::with('tasks')->get(); // inclues task data
    }

    // Create new projects
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:open,in_progress,completed',
        ]);

        $project = Project::create($validated);

        return response()->json($project, 201);
    }

    // Get single project
    public function show($id)
    {
        $project = Project::with('tasks')->findOrFail($id);
        return $project;
    }

    // Update project
    public function update(Request $request,$id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:open,in_progress,completed',
        ]);

        $project->update($validated);
        return $project;
    }

    // Delete project
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return response()->json(['message' => 'Project deleted']);
    }
}
