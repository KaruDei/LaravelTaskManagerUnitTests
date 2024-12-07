@extends('layouts.app')

@section('content')
    
    <div class="container">
        <h1>Your Tasks</h1>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Task Name" required>
            <button type="submit">Add Task</button>
        </form>

        <ul>
            @foreach ($tasks as $task)
                <li>
                    <form action="{{ route('tasks.update', $task) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <input type="text" name="name" value="{{ $task->name }}" required>
                        <input type="checkbox" name="complete" {{ $task->complete ? 'checked' : '' }} onchange="this.form.submit()">
                    </form>

                    <form action=" {{ route('tasks.destroy', $task) }} " method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

@endsection