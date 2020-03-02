<?php

namespace App\Http\Controllers\Api;

use App\CommentTest;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentTestController extends Controller
{
    public function index(Post $post)
    {
        return $post->commenttests()->paginate(10);
    }

    public function show(CommentTest $comment)
    {
        return $comment->replies()->paginate(10);
    }

    public function store(Request $request, Post $post)
    {
        // $data = request()->validate([
        //     'body' => 'required',
        // ]);

        // $post->comments()->create(array_merge($data, [
        //     'user_id' => auth()->user()->id,
        // ]));

        // return new CommentPostCollection($post->comments);

        return auth()->user()->commenttests()->create([
            'body' => $request->body,
            'post_id' => $post->id,
            'comment_id' => $request->comment_id
        ])->fresh();
    }
}
