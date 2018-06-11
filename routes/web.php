<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/','PostsController@index');
Route::get('/posts','PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show');
Route::post('/posts', 'PostsController@store');
Route::post('/posts/{post}/comments', 'CommentsController@store');

/*
use App\Task;

Route::get('', function (){
    $nume = 'Lamba';
    $prenume = 'Bogdan';
    return view('welcome', compact('nume', 'prenume'));
});

Route::get('/tasks', 'TasksController@index');//REST?
Route::get('/tasks/{id}', 'TasksController@show');



Route::get('/', function () {
    $nume = 'Lamba';
    $prenume = 'Bogdan';
    $hardCoded = [
        'task1',
        'task2',
        'task2',
    ];
    $tasks = DB::table('tasks')->get();//query builder, eloquent syntax
    //return $tasks; //returns json array
    return view('welcome', compact('nume', 'prenume', 'hardCoded', 'tasks')//compact maps variables to an array
    );
});

Route::get('/tasks', function () {
    //$tasks = DB::table('tasks')->get();//query builder
    $tasks = Task::all();//eloquent
    //dd($tasks);
    return view('tasks.index', compact('tasks')
    );
});

Route::get('/tasks/{id}', function ($id) {
    //dd($id);//die and dump
    //$tasks=DB::table('tasks')->find($id);
    $tasks = Task::find($id);
    return view('tasks.show', compact('tasks'));// tasks/show
});
*/