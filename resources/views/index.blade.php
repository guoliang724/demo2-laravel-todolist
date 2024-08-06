@extends('layout.app')

@section('title', 'Hello I am a blade template')

@section('content')
@if (count($tasks))
    @foreach ($tasks as $task) 
        <a href="{{route('tasks.show', ['id' => $task->id])}}">{{$task->title}}</a>
        <br>
    @endforeach
@else 
    <div>There are no tasks!</div>
@endif


@if ($tasks->count())
    <div> {{$tasks->links()}}</div>
@endif

@endsection