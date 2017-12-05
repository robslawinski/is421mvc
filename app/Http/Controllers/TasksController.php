<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    //
    public function __construct()
    {
        #$tasks = DB::table('tasks')->get();

        $this->middleware('auth')->except(['index','show']);
    }
    public function index()
    {
        #$tasks = DB::table('tasks')->get();

        $tasks = Task::where('user_id','=', Auth::id())->get();
        return view('tasks.index',compact('tasks'));
    }
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }
    public function create()
    {

        return view('tasks.create',compact('task'));
    }
    public function store()
    {
       $task = new Task;
       $this->validate(request(), [
           'body' => 'required',
       ]);
       $task->user_id = auth()->id();
       $task->body = request('body');
       $task->complete = request('complete');
       $task->save();
       return redirect('/tasks');
    }
    public function update(Task $task)
    {

        $task->body = request('body');
        $task->complete = request('complete');
        $task->save();
        return redirect('/tasks');
    }
    public function edit(Task $task)
    {
        return view('tasks.edit',compact('task'));
    }
    public function destroy(Task $task)
    {
        //
        $task->delete($task);

        // redirect
        return redirect('/tasks');
    }
}
