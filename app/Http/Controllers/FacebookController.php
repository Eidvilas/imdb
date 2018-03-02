<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use Blog\User;

class FacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        $user= Socialite::driver('facebook')->stateless()->user();

        $existingUsers = User::where('facebook_id', '=', $user['id'])->first();

        if ($existingUsers === null) {
            $addUser = new User;
            $addUser->name = $user['name'];
            $addUser->email = $user['email'];
            $addUser->facebook_id = $user['id'];
            $addUser->save();

            Auth::login($addUser);
            return redirect('/home')->with('success', 'pavyko');

        } else {
            Auth::login($existingUsers);
            return redirect('/home');

        }
    }
}