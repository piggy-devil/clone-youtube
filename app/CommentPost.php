<?php

namespace App;

class CommentPost extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
