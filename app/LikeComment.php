<?php

namespace App;

class LikeComment extends Model
{
    public function likeable()
    {
        return $this->morphTo();
    }
}
