<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\LikeCollection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostLikeController extends Controller
{
    public function store(Post $post)
    {
        $post->likes()->toggle(auth()->user());

        return new LikeCollection($post->likes);
    }

    // public function like($entityId, $type)
    // {
    //     $entity = $this->getEntity($entityId);

    //     return auth()->user()->toggleLike($entity, $type);
    // }

    // public function getEntity($entityId)
    // {
    //     $post = Post::find($entityId);

    //     if ($post) return $post;

    //     // $comment = Comment::find($entityId);

    //     // if ($comment) return $comment;

    //     throw new ModelNotFoundException('Entity not found.');
    // }
}
