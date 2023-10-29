@extends('layouts.app')


@section('title', 'Details Page')
@section('content')
    <h1>{{ $taskDetails->taskTitle }}</h1>
    <h2>{{ $taskDetails->taskDescription }}</h2>
    <a href="{{ route('tasks.edit', [$taskDetails->id]) }}">Edit</a>
    <div>
        <form action="{{ route('task.toggle', ['task'=>$taskDetails->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-secondary">
                Mark as {{ $taskDetails->completed ? "incomplete" : "complete" }}
            </button>
        </form>
    </div><br>
    <div>
        <form action="{{ route('task.destroy', [$taskDetails->id]) }}" method="POST">
            @csrf
            {{-- @method('DELETE') --}}
            <input type="submit" value="Delete">
        </form>
    </div>
@endsection
