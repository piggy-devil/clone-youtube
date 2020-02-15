<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;
use App\Http\Resources\Post as PostResource;

class PostController extends Controller
{
    public function index()
    {
        return new PostCollection(request()->user()->posts);
    }

    public function store()
    {
        $data = request()->validate([
            'description' => '',
            // 'image' => '',
            // 'width' => '',
            // 'height' => '',
        ]);

        $post = request()->user()->posts()->create([
            'description' => $data['description'],
            // 'image' => $image ?? null,
        ]);

        return new PostResource($post);
    }
}
