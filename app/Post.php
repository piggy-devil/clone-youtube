<?php

namespace App;

class Post extends Model
{
    // public function channel()
    // {
    //     return $this->belongsTo(Channel::class);
    // }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(CommentPost::class);
    }
}
