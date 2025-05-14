@extends('theme.master')
@section('title', 'Home')

@section('content')

            <!-- Start Leable -->
            <div class="leable">
                <div class="container">
                    <div class="task all-task">
                        <h3>Total</h3>
                        <p>{{ count($tasks ?? []) }}</p>
                    </div>

                    <div class="task task-done">
                        <h3>Completed </h3>
                        <p>{{ isset($tasks) && is_countable($tasks) ? $tasks->where('status', 1)->count() : 0 }}/{{ isset($tasks) && is_countable($tasks) ? $tasks->count() : 0 }}
                        </p>
                    </div>
                    <div class="task task-notdone">
                        <h3>Incomplete </h3>
                        <p>{{ isset($tasks) && is_countable($tasks) ? $tasks->where('status', 0)->count() : 0 }}/{{ isset($tasks) && is_countable($tasks) ? $tasks->count() : 0 }}
                        </p>
                    </div>
                    <div class="task task-avg">
                        <h3>Average </h3>
                        <p>
                            {{
        isset($tasks) && is_countable($tasks) && $tasks->count() > 0
        ? number_format($tasks->where('status', 1)->count() / $tasks->count(), 2)
        : '0.00'
                            }}
                        </p>
                    </div>
                </div>
            </div>
            <!-- End Leable -->


            <!-- Start Create Task -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('task.store') }}" method="post">
                @csrf
                <div class="container">
                    <label for="title">Title</label>
                    <input type="text" placeholder="Enter Title" name="title">
                    <label for="description">Description</label>
                    <textarea name="description" id="" cols="5" rows="2" placeholder="Write Your Task"></textarea>
                    <button type="submit">Create Task</button>
                </div>
            </form>
            <!-- End Create Task -->

            <!-- Start Task List -->
            <div class="task-list">
                <div class="container">
                    <div class="heading">
                        <h1>All Tasks</h1>
                    </div>

                    @foreach($tasks as $task)
                        <div class="task-item">
                            <div class="task-title">
                                <h3 class="task-title-text @if($task->status == 1) completed-text @endif">{{ $task->title }}</h3>
                                <p class="task-description @if($task->status == 1) completed-text @endif">{{ $task->description }}</p>
                            </div>

                            <div class="task-action">
                                {{-- Complete Button --}}
                                <form action="{{ route('task.complete', $task->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    @if($task->status == 0)
                                        <button type="submit" class="btn-complete">Complete</button>
                                    @else
                                        <button type="submit" class="btn-incomplete">Incomplete</button>
                                    @endif
                                </form>

                                {{-- Edit Button --}}
                                <form action="{{route('theme.edit', $task->id)}}" method="get">
                                    <button type=" submit" class="btn-edit">Edit</button>
                                </form>


                                {{-- Delete Button --}}
                                <form action="{{ route('task.destroy', $task->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn-delete"
                                        onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

@endsection
