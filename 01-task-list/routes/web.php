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

Route::post('/tasks', function (Request $request) {
    dd($request->all());
})->name('tasks.store');

Route::fallback(function () {
    return 'Could not find any resource for this route';
});
