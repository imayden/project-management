<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\Project;

// class ProjectTest extends TestCase
// {
//     /**
//      * A basic unit test example.
//      */
//     public function test_example(): void
//     {
//         $this->assertTrue(true);
//     }
// }
class ProjectTest extends TestCase
{
    // 测试创建项目
    public function test_create_project()
    {
        $data = [
            'title' => 'Test Project',
            'description' => 'This is a test project.',
            'status' => 'open',
        ];

        $project = Project::create($data);

        $this->assertInstanceOf(Project::class, $project);
        $this->assertEquals('Test Project', $project->title);
        $this->assertEquals('This is a test project.', $project->description);
        $this->assertEquals('open', $project->status);
    }

    // 测试更新项目
    public function test_update_project()
    {
        $project = Project::factory()->create([
            'title' => 'Old Title',
            'status' => 'open',
        ]);

        $project->update([
            'title' => 'Updated Title',
            'status' => 'completed',
        ]);

        $this->assertEquals('Updated Title', $project->title);
        $this->assertEquals('completed', $project->status);
    }

    // 测试删除项目
    public function test_delete_project()
    {
        $project = Project::factory()->create();
        $projectId = $project->id;

        $project->delete();

        $this->assertNull(Project::find($projectId));
    }

    // 测试获取单个项目
    public function test_get_single_project()
    {
        $project = Project::factory()->create([
            'title' => 'Single Project',
        ]);

        $foundProject = Project::find($project->id);

        $this->assertNotNull($foundProject);
        $this->assertEquals('Single Project', $foundProject->title);
    }

    // 测试获取所有项目
    // public function test_get_all_projects()
    // {
    //     Project::factory()->count(5)->create();

    //     $projects = Project::all();

    //     $this->assertCount(5, $projects);
    // }
}