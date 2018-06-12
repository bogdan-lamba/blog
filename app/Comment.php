<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //for $comment->post; -find the post associated with the comment
    public function post()
    {
        return $this->belongsTo(Post::class);//App\Post string for path to class
    }
}
