<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function ajax_save_comment(Request $request)
    {
        $comment_to = Auth::user()->id;
        $comment = new Comment();
        $comment->comments = $request->comments;
        $comment->task_id = $request->taskid;
        $comment->comment_by = $request->comment_by;
        $comment->comment_to = $comment_to;
        $comment->save();
        echo json_encode('ok');
    }
}
