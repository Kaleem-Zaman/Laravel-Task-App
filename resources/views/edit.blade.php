@extends('layouts.app')

@section('title', "Update Task")

@section('content')

    <form method="POST" action="{{ route('tasks.update', ['task'=>$task->id]) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="taskTitle" id="title" value="{{ $task->taskTitle }}">
            @error('title')
                <p>{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="taskDescription" id="description"  cols="30" rows="5">{{ $task->taskDescription }}</textarea>
            @error('description')
                <p>{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="longDescription">Long Description</label>
            <textarea name="longDescription" id="longDescription" cols="30" rows="5">{{ $task->longDescription }}</textarea>
            @error('longDescription')
                <p>{{$message}}</p>
            @enderror
        </div>
        <input type="submit" value="Update Task">
    </form>

@endsection
