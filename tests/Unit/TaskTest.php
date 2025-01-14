<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\Task;
use App\Models\Project;

// class TaskTest extends TestCase
// {
//     /**
//      * A basic unit test example.
//      */
//     public function test_example(): void
//     {
//         $this->assertTrue(true);
//     }
// }

class TaskTest extends TestCase
{
    // 测试创建任务
    public function test_create_task()
    {
        $project = Project::factory()->create();

        $data = [
            'project_id' => $project->id,
            'title' => 'Test Task',
            'description' => 'This is a test task.',
            'status' => 'to_do',
        ];

        $task = Task::create($data);

        $this->assertInstanceOf(Task::class, $task);
        $this->assertEquals('Test Task', $task->title);
        $this->assertEquals($project->id, $task->project_id);
    }

    // 测试更新任务
    public function test_update_task()
    {
        $task = Task::factory()->create([
            'title' => 'Old Task Title',
        ]);

        $task->update([
            'title' => 'Updated Task Title',
        ]);

        $this->assertEquals('Updated Task Title', $task->title);
    }

    // 测试删除任务
    public function test_delete_task()
    {
        $task = Task::factory()->create();
        $taskId = $task->id;

        $task->delete();

        $this->assertNull(Task::find($taskId));
    }

    // 测试获取单个任务
    public function test_get_single_task()
    {
        $task = Task::factory()->create([
            'title' => 'Single Task',
        ]);

        $foundTask = Task::find($task->id);

        $this->assertNotNull($foundTask);
        $this->assertEquals('Single Task', $foundTask->title);
    }

    // // get all tasks 
    // public function test_get_all_tasks()
    // {
    //     Task::factory()->count(5)->create();

    //     $tasks = Task::all();

    //     $this->assertCount(5, $tasks);
    // }
}