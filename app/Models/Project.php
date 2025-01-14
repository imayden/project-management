<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    // Fields that allow batch assignment
    protected $fillable = ['title', 'description', 'status'];

    // One project has multiple tasks
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
