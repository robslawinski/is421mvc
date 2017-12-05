@extends('layout')

@section('content')

    <form action="/is421mvc/public/tasks/{{$task->id}}/edit" method="post" class="col-sm-8">

        <div class="form-group">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <label for="taskTitle">Task Title</label>
            <input type="text" class="form-control" id="taskTitle" name="body" value="{{$task->body}}" required>
        </div>
        <div class="form-group">
            <label for="taskStatus">Task Status</label>
            <select class="form-control" id="taskStatus" name="complete" value="{{$task->complete}}">
                <option value="1">Complete</option>
                <option value="0">Incomplete</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>

    </form>
    <p>

    <form action="/is421mvc/public/tasks/{{$task->id}}/delete" method="post" class="col-sm-8">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
    <button type="submit" class="btn btn-danger">Delete</button>

    </form>
    Created at: {{date("F d, Y h:i:s", strtotime($task->created_at))}}<br></br>
    Updated at: {{$task->updated_at}}</br>
    </p>

@endsection