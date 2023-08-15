<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function create()
    {
        return view('register.create');
    }

    public function store()
    {

        $attributes = request()->validate([
            'name' => 'required|min:3|max:225',
            'username' => 'required|min:3|max:255|unique:users,username',
            'email' => 'required|email|min:2|max:244|unique:users,email',
            'password' => 'required|min:7|max:255'
        ]);


        $user = User::create($attributes);

        //log the user in
        auth()->login($user);
        //flash the user with success message
        return redirect('/')->with('success', 'Your account has been created.');
    }
}
