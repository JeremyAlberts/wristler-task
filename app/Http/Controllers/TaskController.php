<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('home', compact('tasks'));
    }

    public function store(Request $request)
    {
        $task = $request->validate([
            'content' => 'required'
        ]);

        Task::create($task);

        return back();
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return back();
    }

    public function update(Task $task)
    {
        $task->isDone = !$task->isDone;
        $task->save();

        return back();
    }
}
