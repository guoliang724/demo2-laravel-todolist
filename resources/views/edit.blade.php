@extends('layout.app')


@section('style')

    <style>
        .error {
            color: red;
            font-size: 12px;
        }
    </style>

@section('title', 'Edit Task')

@section('content')
    <form method="POST" action="{{ route('tasks.update', ['id' => $task->id]) }}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5">{{ $task->description }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" rows="10">{{ $task->long_description }}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-2">
            <button class="btn" type="submit">Edit Task</button>
            <a class="btn" href="{{ route('tasks.index') }}">Cancle</a>
        </div>
    </form>

@endsection
