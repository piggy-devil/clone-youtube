<?php

namespace App\Http\Controllers;

use App\Video;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Video $video)
    {
        return $video->comments()->paginate(10);
    }

    public function show(Comment $comment)
    {
        return $comment->replies()->paginate(10);
    }
}
