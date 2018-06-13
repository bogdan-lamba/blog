<?php

namespace App\Http\Controllers;

use App\Post;

class PostsController extends Controller
{
    public function __construct(){
       $this->middleware('auth')->except(['index', 'show']);//like a filter, cant access any method except() unless
        // user is authenticated, it will redirect to /login
    }

    public function index()
    {
        $posts = Post::latest()
            ->filter(request(['month','year']))
            ->get();

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
        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);//auth()->user()->id
        //auth()->user()->publish(new Post(request('title', 'body'))); //clearer, have to define publish in User
        // where we pass the create on $this

        return redirect('/');
        //create a new post using the request data
        //save it to the database
        //redirect to homepage
    }
    	
}
