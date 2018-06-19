<?php

namespace App\Http\Controllers;

Use App\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
        $posts = $tag->posts;
        return view('posts.index', compact('posts'));
    }
}
