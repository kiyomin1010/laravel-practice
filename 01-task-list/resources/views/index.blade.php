@extends('layouts.app')

@section('title', 'The List of Tasks')

@section('content')
    <div class="mb-4">
        <a href="{{ route('tasks.create') }}" class="link">
            Create New Task
        </a>
    </div>
    @if (count($tasks) > 0)
        @foreach ($tasks as $task)
            <div>
                <a href="{{ route('tasks.show', ['task' => $task]) }}" @class(['line-through' => $task->completed])>
                    {{ $task->title }}
                </a>
            </div>
        @endforeach
    @else
        <div>There is no task!</div>
    @endif

    @if ($tasks->count())
        <div class="mt-4">
            {{ $tasks->links() }}
        </div>
    @endif
@endsection
