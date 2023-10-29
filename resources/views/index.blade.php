@extends('layouts.app')

@section('title', "List of Tasks")


@section('content')
    <a href="{{route("task.create")}}" class="btn btn-primary"><b>+</b> Add Task</a>
    @forelse ($tasks as $task)
        <div>
            <a href={{ route('tasks.show', $task->id) }}>{{ $task->taskTitle }}</a>
        </div>
    @empty
        <p>There are no tasks available!</p>
    @endforelse

    @if($tasks->count())
        <div>
            {{$tasks->links()}}
        </div>
    @endif
@endsection
