<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\Http\Resources\LikeCollection;
use App\Http\Controllers\Controller;

class PostLikeController extends Controller
{
    public function store(Post $post)
    {
        $post->likes()->toggle(auth()->user());

        return new LikeCollection($post->likes);
    }
}
