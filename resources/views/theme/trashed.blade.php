@extends('theme.master')

@section('title', 'Trashed')
@section('content')

    <!-- Start Task List -->
    <div class="task-list">
        <div class="container">
            <div class="heading">
                <h1>All Tasks Deleted</h1>
            </div>

            @foreach($deletedTasks as $task)
                <div class="task-item">
                    <div class="task-title">
                        <h3 class="task-title-text @if($task->status == 1) completed-text @endif">{{ $task->title }}</h3>
                        <p class="task-description @if($task->status == 1) completed-text @endif">{{ $task->description }}</p>
                    </div>

                    <div class="task-action">
                        {{-- Restore Button --}}
                        <form action="{{ route('task.restore', $task->id) }}" method="POST">
                            @csrf
                            <button type=" submit" class="btn-complete">Restore</button>
                        </form>


                        {{-- Delete Button --}}
                        <form action="{{ route('task.forceDelete', $task->id) }}" method="POST">
                            @csrf
                            <button class="btn-delete"
                                onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection