<?php

namespace App;

class CommentTest extends Model
{
    protected $with = ['user', 'likes'];

    protected $appends = ['repliesCount'];

    public function getRepliesCountAttribute()
    {
        return $this->replies->count();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function replies()
    {
        return $this->hasMany(CommentTest::class, 'comment_id')->whereNotNull('comment_id');
    }

    public function likes()
    {
        return $this->morphMany(LikeComment::class, 'likeable');
    }

}
