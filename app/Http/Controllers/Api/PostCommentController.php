<?php

namespace App\Http\Controllers\Api;

use App\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentPostCollection;

class PostCommentController extends Controller
{
    public function store(Post $post)
    {
        $data = request()->validate([
            'body' => 'required',
        ]);

        $post->comments()->create(array_merge($data, [
            'user_id' => auth()->user()->id,
        ]));

        return new CommentPostCollection($post->comments);
    }
}
