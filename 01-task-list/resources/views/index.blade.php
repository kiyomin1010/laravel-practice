@extends('layouts.app')

@section('title', 'The List of Tasks')

@section('content')
    @if (count($tasks) > 0)
        @foreach ($tasks as $task)
            <div>
                <a href="{{ route('tasks.show', ['task' => $task]) }}">{{ $task->title }}</a>
            </div>
        @endforeach
    @else
        <div>There is no task!</div>
    @endif
@endsection
