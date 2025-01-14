<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

// RESTful resource routes：projects
Route::apiResource('projects', ProjectController::class);

// task list & create（based on the assigned project id
Route::get('projects/{project}/tasks', [TaskController::class, 'index']);
Route::post('projects/{project}/tasks', [TaskController::class, 'store']);

// RESTful resource routes：tasks（excludes index, store，since they were implemented separatedly above）
Route::apiResource('tasks', TaskController::class)->except(['index', 'store']);

// Route to get all tasks
Route::get('/tasks', [TaskController::class, 'getAllTasks']);
