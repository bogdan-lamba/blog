<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationController extends Controller
{
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
        return redirect()->home();//need to name the route
    }
}
