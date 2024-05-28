<?php 

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Task;

class TaskController extends Controller 
{
    public function index()
    {
        $tasks = Task::with(relations:'user')->orderBy(column:'due_date')->get();

        return view('admin.tasks.index', compact(var_name: 'tasks'));
    }
}