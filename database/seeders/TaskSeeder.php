<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // get all projects
        $projects = Project::all();

        // for each project, create 2 tasks
        foreach ($projects as $project) {
            Task::factory()
                ->count(2)
                ->create([
                    'project_id' => $project->id,
                ]);
        }
    }
}
