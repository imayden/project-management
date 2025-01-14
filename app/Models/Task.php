<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    // Fields that allow batch assignment
    protected $fillable = ['project_id', 'title', 'description', 'assigned_to', 'due_date', 'status'];

    // One task belongs to one project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
