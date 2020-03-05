<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\CommentTest;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LikeCommentController extends Controller
{
    // public function like(CommentTest $commentTest, $type)
    // {
    //     return auth()->user()->toggleLikeComment($commentTest, $type);
    // }

    public function like($entityId, $type)
    {
        $entity = $this->getEntity($entityId);

        return auth()->user()->toggleLike($entity, $type);
    }

    public function getEntity($entityId)
    {
        $comment = CommentTest::find($entityId);

        if ($comment) return $comment;

        $post = Post::find($entityId);

        if ($post) return $post;

        throw new ModelNotFoundException('Entity not found.');
    }
}
