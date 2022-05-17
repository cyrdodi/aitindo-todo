<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
  public function index()
  {
    return view(
      'home',
      [
        'tasks' => Todo::orderBy('status', 'desc')->get(),
      ]
    );
  }

  public function store()
  {
    $attributes = request()->validate([
      'task' => 'required'
    ]);

    Todo::create($attributes);

    return redirect()->back();
  }

  public function destroy(Todo $todo)
  {
    $todo->delete();

    return redirect()->back();
  }

  public function update(Todo $todo)
  {
    // update the status of the task to 0

    $todo->update(['status' => '0']);

    return redirect()->back();
  }
}
