<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    $tasks = Task::latest()->get();

    return view('index', [
        'tasks' => $tasks,
    ]);
})->name('tasks.index'); // 'index' means list of resources

Route::view('tasks/create', 'create')
    ->name('tasks.create');

Route::get('/tasks/{id}', function ($id) {
    $task = Task::findOrFail($id);

    return view('show', [
        'task' => $task,
    ]);
})->name('tasks.show'); // 'show' means details of the resource

Route::get('/tasks/{id}/edit', function ($id) {
    $task = Task::findOrFail($id);

    return view('edit', [
        'task' => $task,
    ]);
})->name('tasks.edit'); // 'show' means details of the resource

Route::post('/tasks', function (Request $request) {
    // If validation fails, the error and flash messages are stored in the user session
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();

    return redirect()->route('tasks.show', ['id' => $task->id])
        ->with('success', 'New task created successfully!');
})->name('tasks.store');

Route::put('/tasks/{id}', function ($id, Request $request) {
    // If validation fails, the error and flash messages are stored in the user session
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);

    $task = Task::findOrFail($id);
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();

    return redirect()->route('tasks.show', ['id' => $task->id])
        ->with('success', 'Task updated successfully!');
})->name('tasks.update');

Route::fallback(function () {
    return 'Could not find any resource for this route';
});
