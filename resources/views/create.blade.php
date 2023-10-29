@extends('layouts.app')

@section('title', "Add Task")

@section('content')

    <form action="{{ route('task.store') }}" method="POST">
        @csrf

        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
            @error('title')
                <p>{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="5"></textarea>
            @error('description')
                <p>{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="longDescription">Long Description</label>
            <textarea name="longDescription" id="longDescription" cols="30" rows="5"></textarea>
            @error('longDescription')
                <p>{{$message}}</p>
            @enderror
        </div>
        <input type="submit" value="Create Task">
    </form>

@endsection
