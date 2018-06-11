<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();//Post::order_by('created_at','desc')->get();
    	return view('posts.index', compact('posts'));
    }

/*    public function show($id)
    {
        $post = Post::find($id);
    	return view('posts.show', compact('post'));
    }*/

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
       // dd(request()->all());
        /*
        $post = new POST;
        $post->title = request('title');
        $post->body = request('body');
        $post->save();
        */
        $this->validate(request(), [
           'title' => 'required|min:4|max:100',
           'body'  => 'required'
        ]);
        //Post::create(request()->all());//bad->user can add fields to form and submit them
        Post::create(request(['title', 'body']));
        return redirect('/');
        //create a new post using the request data
        //save it to the database
        //redirect to homepage
    }
    	
}
