<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\Welcome;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {
        //validate,create and save user,sign in,redirect home
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        //or make register method in user
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        //auth()->login($user);
        \Auth::login($user);//Auth facade, same for \Request:: instead of request()->

        \Mail::to($user)->send(new Welcome($user));

        session()->flash('message', 'Thank you for signing up!');//session for only one page load

        return redirect()->home();//need to name the route
    }
}
