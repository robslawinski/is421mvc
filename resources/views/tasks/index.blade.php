@extends("layout");
@section("content");


    @if($tasks->isEmpty())
        <a href ="/is421mvc/public/tasks/create"> <b>Create a Task</b></a>
    @else
        @if(Auth::check())
            <h1>{{Auth::user()-> name}}'s Task List</h1>

            <div class="row">

                <div class="col-6">

                    <table class="table table-table table-striped">

                        <thead>

                        <tr>

                            <th>#</th>

                            <th>Task Name</th>

                            <th>Completed</th>

                            <th>Created</th>

                            <th>Action</th>

                            <th>Delete</th>

                        </tr>

                        </thead>

                        <tbody>

            @foreach ($tasks as $task)
                <tr>

                    <td>{{$task->id}}</td>

                    <td><a href="/is421mvc/public/tasks/{{$task->id}}">{{ $task->body }}</a></td>

                    <td>

                        <?php

                        if (!($task->complete)){

                            echo "No";

                        } else {

                            echo "Yes";

                        }

                        ?>

                    </td>
                    <td>

                    {{$task->created_at}}

                    <!--$date = date("d/m/Y", $task->created_at)-->

                        <!-- date("m/d/y", $task->created_at)-->

                    </td>
                    <td><button type="button" class="btn btn-warning">

                            <span class="glyphicon glyphicon-edit"></span>

                            <a href="/is421mvc/public/tasks/{{$task->id}}">Edit</a>

                        </button>

                    </td>
                    <td>
                        <div>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal-{{ $task->id }}">

                                <span class="glyphicon glyphicon-trash"></span>

                            </button>



                            <!-- Modal -->
                            <div id="myModal-{{ $task->id }}" class="modal fade" role="dialog">

                                <div class="modal-dialog">


                                    <!-- Modal content-->

                                    <div class="modal-content">



                                        <div class="modal-header">

                                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                                            <h3 class="modal-title">Delete Task {{$task->id}}</h3>

                                        </div>

                                        <div class="modal-body text-danger text-center">

                                            <h4>Task name: {{$task->body}}</h4>

                                            <h4>Completed: <?php

                                                if (!($task->complete)){

                                                    echo "No";

                                                } else {

                                                    echo "Yes";

                                                }

                                                ?></h4>

                                            <h4>Create at: {{$task->created_at}}</h4>

                                        </div>

                                        <div class="modal-footer">

                                            <h5 class="text-center">Please click on "confirm" to delete task. Click on "cancel" to cancel delete task. </h5>



                                            <form action="/is421mvc/public/tasks/{{$task->id}}/delete" method="post" class="col-8">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                    <button type="submit" class="btn btn-danger">Confirm</button>

                                                 <button type="button" class="btn btn-primary">

                                                    <a class="bg-primary" href="/is421mvc/public/tasks">Cancel</a>

                                                </button>

                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

                                            </form>

                                        </div>

                                    </div>



                                </div>

                            </div>

                            <!-- end model-->

                        </div>

                    </td>

                </tr>

            @endforeach

            </tbody>
        </table>

                    <div class="btn-group-vertical pull-right">

                        <button type="button" class="btn btn-primary">

                            <a class="bg-primary" href="/is421mvc/public/tasks/create">Create New Task</a>

                            <span class="glyphicon glyphicon-pencil"></span>

                        </button>



                    </div>

                </div>

            </div><!--/row-->



        @else
            <b>Welcome</b>
        @endif
    @endif
@endsection;