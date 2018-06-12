<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    //
    public function store(Post $post)
    {
        /*
         *  could insert the comment here or make an addComment() method in Post for better clarity
         *  Comment::create([
           'body' => request('body'),
           'post_id' => $post->id
        ]);*/
        $this->validate(request(), [
            'body'  => 'required|min:2'
        ]);
        $post->addComment(request('body'));

        return back();
    }
}
