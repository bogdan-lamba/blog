<?php

namespace App\Http\Controllers;


class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');//only unauth visitors will get to access create()/login form and
        // store()/login
        //except signed in users can logout
        //auto redirects to home route
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        //attempt to login with request from form, sign them in, redirect them
        if (! auth()->attempt(request(['email','password']))) {
            return back()->withErrors([
                'message' => 'Please check your credentials and try again'
            ]);
        }

        return redirect()->home();
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->home();
    }
}
