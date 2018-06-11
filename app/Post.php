<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
//extending our own Model class for the guarded property

class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);//App\Comment string of class path
    }

    public function addComment($body)
    {
        $this->comments()->create(compact('body'));//autoincrements id and adds post_id of $this, or we cna just
        // Comment::create([])
    }
}
