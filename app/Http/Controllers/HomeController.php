<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;
use Blog\User;
use Blog\Categorie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Categorie::all();
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('home', [
                'movies'=> $user->movie,
                'categories'=>$categories
        ]);

    }
}
