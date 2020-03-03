<?php

namespace App\Http\Controllers\Api;

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

        return auth()->user()->toggleLikeComment($entity, $type);
    }

    public function getEntity($entityId)
    {
        $comment = CommentTest::find($entityId);

        if ($comment) return $comment;

        // $comment = Comment::find($entityId);

        // if ($comment) return $comment;

        throw new ModelNotFoundException('Entity not found.');
    }
}
