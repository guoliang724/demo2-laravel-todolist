@extends('layout.app')

@section('title', 'Hello I am a blade template')

@section('content')
    <nav class="mb-4">
        <a class="link" href="{{ route('tasks.create') }}">
            Add Task!</a>
    </nav>
    @if (count($tasks))
        @foreach ($tasks as $task)
            <a @class([
                'border-l-2 border-solid border-red-300 my-3',
                'mt-10',
                'line-through' => $task->completed,
            ]) href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
            <br>
        @endforeach
    @else
        <div>There are no tasks!</div>
    @endif


    @if ($tasks->count())
        <nav class="mt-4">{{ $tasks->links() }}</nav>
    @endif

@endsection
