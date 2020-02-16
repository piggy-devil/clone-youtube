<?php

namespace App;

class Product extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
