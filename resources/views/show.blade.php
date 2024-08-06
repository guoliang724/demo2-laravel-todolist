@extends('layout.app')


@section('title', $task->title)


@section('content')

    <div class="mb-4">
        <a href="{{ route('tasks.index') }}" class="font-medium text-gray-700 underline decoration-black-500">
            <== </a>
    </div>
    <p class="mb-4 text-slate-700">{{ $task->description }}</p>
    @if ($task->long_description)
        <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
    @endif
    <p class="mb-4 text-sm text-slate-500">
        Created: {{ $task->created_at->diffForHUmans() }}
        ❤
        Updated: {{ $task->updated_at->diffForHUmans() }}</p>


    @if ($task->completed)
        <span class="font-medium text-green-500">Completed</span>
    @else
        <span class="font-medium text-red-500">Not Completed</span>
    @endif

    <div class="flex gap-2 mt-5">
        <a class="btn" href="{{ route('tasks.edit', ['id' => $task->id]) }}">Edit</a>

        <form action="{{ route('tasks.toggle-complete', ['id' => $task->id]) }}" method="post">
            @csrf
            @method('put')
            <button class="btn" type="sumbmit">Toggle
            </button>
        </form>

        <form action="{{ route('tasks.destory', ['id' => $task->id]) }}" method="post">
            @csrf
            @method('delete')
            <button type="sumbmit" class="btn">Delete</button>
        </form>

    </div>


@endsection
