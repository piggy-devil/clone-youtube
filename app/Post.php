<?php

namespace App;

class Post extends Model
{
    // public function channel()
    // {
    //     return $this->belongsTo(Channel::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
