<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Comment;

class CommentsController extends Controller
{
    public function create(Task $task) {
        $userID = auth()->id();

        $task->addComment(request('body'), $userID);
        return back();
    }


}
