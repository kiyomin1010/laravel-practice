<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
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

// Route Model Binding
// The route automatically finds the model instance by mapping a specific part of the URL to the model's PK, and then it automatically injects the model instance
Route::get('/tasks/{task}', function (Task $task) {
    return view('show', [
        'task' => $task,
    ]);
})->name('tasks.show'); // 'show' means details of the resource

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task,
    ]);
})->name('tasks.edit'); // 'show' means details of the resource

Route::post('/tasks', function (TaskRequest $request) {
    // If validation fails, the error and flash messages are stored in the user session
    $data = $request->validated();
    $task = Task::create($data); // Mass assignment

    return redirect()->route('tasks.show', ['task' => $task])
        ->with('success', 'New task created successfully!');
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    // If validation fails, the error and flash messages are stored in the user session
    $data = $request->validated();
    $task->update($data);

    return redirect()->route('tasks.show', ['task' => $task])
        ->with('success', 'Task updated successfully!');
})->name('tasks.update');

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');

Route::fallback(function () {
    return 'Could not find any resource for this route';
});
