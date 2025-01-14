<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Get all tasks for all projects
    public function getAllTasks()
    {
        return response()->json(Task::all(), 200);
    }
    
    // Get all tasks for the specified project
    public function index($projectId)
    {
        return Task::where('project_id', $projectId)->get();
    }

    // Create task
    public function store(Request $request, $projectId)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'assigned_to' => 'nullable|string|max:255',
            'due_date' => 'nullable|date',
            'status' => 'required|in:to_do,in_progress,done',
        ]);

        // Add project id
        $validated['project_id'] = $projectId;

        $task = Task::create($validated);
        return response()->json($task, 201);
    }

    // Get single task
    public function show($id)
    {
        $task = Task::findOrFail($id);
        return $task;
    }

    // Update task
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'assigned_to' => 'nullable|string|max:255',
            'due_date' => 'nullable|date',
            'status' => 'required|in:to_do,in_progress,done',
        ]);

        $task->update($validated);
        return $task;
    }

    // Delete task
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(['message' => 'Task deleted']);
    }
}
