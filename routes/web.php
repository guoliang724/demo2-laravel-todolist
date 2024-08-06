<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
  return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
  $tasks = Task::latest()->paginate();
  return view('index', ['tasks' => $tasks]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{id}/edit', function ($id) {
  $task = Task::find($id);

  return view('edit', ['task' => $task]);
})->name('tasks.edit');

Route::get('/tasks/{id}', function ($id) {
  $task = Task::find($id);
  return view('show', ['task' => $task]);
})->name('tasks.show');

Route::post('/tasks', function (Request $request) {
  $data = $request->validate([
    'title' => 'required|max:255',
    'description' => 'required',
    'long_description' => "required",
  ]);


  $task = new Task();
  $task->title = $data["title"];
  $task->description = $data["description"];
  $task->long_description = $data["long_description"];

  $task->save();

  return redirect()->route("tasks.show", ['id' => $task->id])->with('sucess', "Task created successfully!");
})->name("tasks.store");

Route::put('/tasks/{id}', function ($id, Request $request) {
  $data = $request->validate([
    'title' => 'required|max:255',
    'description' => 'required',
    'long_description' => "required",
  ]);


  $task = Task::findOrFail($id);
  $task->title = $data["title"];
  $task->description = $data["description"];
  $task->long_description = $data["long_description"];

  $task->save();

  return redirect()->route("tasks.show", ['id' => $task->id])->with('sucess', "Task updated successfully!");
})->name("tasks.update");

Route::delete("/tasks/{id}", function ($id, Request $request) {
  $task = Task::findOrFail($id);
  $task->delete();

  return redirect()->route("tasks.index")->with('sucess', 'Task deleted successfully');
})->name("tasks.destory");

Route::put("/tasks/{id}/toggle-complete", function ($id, Request $request) {

  $task = Task::findOrFail($id);
  $task->toggleComplete();

  return redirect()->back()->with("sucess", "the task is completed");
})->name("tasks.toggle-complete");
// 388 
