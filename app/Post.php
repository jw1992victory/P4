<?php

namespace P4;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function tags()
    {
        # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('P4\Tag')->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo('P4\Category');
    }
}
