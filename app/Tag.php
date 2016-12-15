<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;
use P4\Post;

class Tag extends Model
{
    public function posts() {
        return $this->belongsToMany('P4\Post')->withTimestamps();
    }
}
