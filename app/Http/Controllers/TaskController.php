<?php 

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;


class TaskController extends Controller 
{

    public function index()
    {
        $tasks = Task::with(relations:'user')->orderBy(column:'due_date')->get();

        return view('tasks.index', compact(var_name: 'tasks'));
    }


    public function create()
    {
        $this->authorize('tasks_create');


        // this way of writing is for Policies
        // $this->authorize(ability: 'create', arguments: Task::class);

        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $this->authorize('tasks_create');

        Task::create($request->only('description', 'due_date'));

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        $this->authorize('tasks_edit');

         // this way of writing is for Policies

        // $this->authorize(ability: 'update', $task);
        // return view('tasks.edit', compact('task'));

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('tasks_edit');

        

        $task->update($request->only('description', 'due_date'));

        return redirect()->route('tasks.index');
    }

    public function delete(Task $task)
    {
        $this->authorize(ability: 'tasks_delete');

         // this way of writing is for Policies
         
        // $this->authorize( 'delete', $task);

        $task->delete();

        return redirect()->route('tasks.index');
    }



}