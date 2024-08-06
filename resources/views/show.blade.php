@extends('layout.app')


@section('title', $task->title)


@section("content")

<p>{{$task->description}}</p>
@if ($task->long_description)
    <p>{{$task->long_description}}</p>
@endif  <p>{{$task->created_at}}</p>
<p>{{$task->updated_at}}</p>

@if ($task->completed)
  Task is Completed
  @else
  Task is Not Completed
@endif

<div>
    <a href="{{route("tasks.edit", ['id' => $task->id])}}">Edit</a>
</div>


<div>
    <form action="{{route('tasks.toggle-complete', ['id' => $task->id])}}" method="post">
        @csrf
        @method('put')
    <button type="sumbmit">Toggle
    </button>
    </form>
</div>

<div>
    <form action="{{route('tasks.destory', ['id' => $task->id])}}" method="post">
        @csrf
        @method('delete')
        <button type="sumbmit">Delete</button>
    </form>
</div>

@endsection