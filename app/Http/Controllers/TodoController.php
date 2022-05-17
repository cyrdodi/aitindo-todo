<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TodoController extends Controller
{
  public function index()
  {
    $tasks = Task::orderBy('created_at', 'desc')->get();

    return view(
      'home',
      [
        'tasks' => $tasks,
      ]
    );
  }

  public function store()
  {
    $attributes = request()->validate([
      'name' => 'required'
    ]);

    Task::create($attributes);

    return redirect()->back();
  }

  public function destroy(Task $task)
  {
    $task->delete();

    return redirect()->back();
  }

  public function update(Task $task)
  {
    $task->update(['complete' => !$task->complete]);

    return redirect()->back();
  }
}
