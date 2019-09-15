<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PagesController extends Controller
{
	  public function __construct()
    {
        $this->middleware('auth', ['except' => ['about', 'home']]);
    }
    
    public function home(){
    	$posts= Post::orderBy('created_at','desc')->paginate(4);

    	return view('includes.home',compact('posts'));
    }

    public function about(){
    	return view('includes.about');
    }

    public function forum(){
    	$user= User::all();
    	return view('includes.categories',compact('user'));
    }
}
