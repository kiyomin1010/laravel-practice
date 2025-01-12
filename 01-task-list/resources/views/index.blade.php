<h1>
    The List of Tasks
</h1>

<div>
    @if (count($tasks) > 0)
        @foreach ($tasks as $task)
            <div>
                <a href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
            </div>
        @endforeach
    @else
        <div>There is no task!</div>
    @endif
</div>
