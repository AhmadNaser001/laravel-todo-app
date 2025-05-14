@extends('theme.master')

@section('content')
    <!-- Start Create Task -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{route('task.update', $task->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="container">
            <label for="title">Title</label>
            <input type="text" placeholder="Enter Title" name="title" value="{{$task->title}}">
            <label for="description">Description</label>
            <textarea name="description" id="" cols="5" rows="2"
                placeholder="Write Your Task">{{$task->description}}</textarea>
            <button type="submit">Upate Task</button>
        </div>
    </form>


@endsection
<!-- End Create Task -->