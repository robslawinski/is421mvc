@extends("layout");
@section("content");

    @if($tasks->isEmpty())
        <a href ="/is421mvc/public/tasks/create"> <b>Create a Task</b></a>
    @else
        @if(Auth::check())
            <h1>{{Auth::user()-> name}}'s Task List</h1>

            @foreach ($tasks as $task)

                    <li>
                        <a href="/is421mvc/public/tasks/{{$task->id}}">
                        {{ $task->body }}
                        </a>
                    </li>


            @endforeach
        @else
            <b>Welcome</b>
        @endif
    @endif
@endsection;