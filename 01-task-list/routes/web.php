<?php

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

Route::get('/tasks/{id}', function ($id) {
    $task = Task::findOrFail($id);
    return view('show', [
        'task' => $task,
    ]);
})->name('tasks.show'); // 'show' means details of the resource

Route::fallback(function () {
    return 'Could not find any resource for this route';
});
