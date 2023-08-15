<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Config\Exception\ValidationException;

class SessionController extends Controller
{
    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'GoodByeeeeee!');
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        // validate the request
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //attemt to athenticate and log the user
        // based on the provided credenrials
        if (auth()->attempt($attributes)) {
            //session fixation for security
            session()->regenerate();
            // redirect with succes flash message
            return redirect('/')->with('success', 'welcome Back home bae!');
        }
        //auth failed
        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified'
        ]);
        //   return back()->withErrors(['email'=>'Your provided credentials could not be verified']); //
    }

}
