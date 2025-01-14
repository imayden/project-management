<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;
use App\Models\Project;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'project_id'  => Project::factory(), // Connect to a new created Project by default
            'title'       => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'assigned_to' => $this->faker->name,
            'due_date'    => $this->faker->date,
            'status'      => $this->faker->randomElement(['to_do', 'in_progress', 'done']),
        ];
    }
}
