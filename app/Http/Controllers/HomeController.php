<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $article = Article::all();
        if(Auth::user()->role == "Admin"){
            return view('beranda', compact('article'));
        } else if (Auth::user()->role == "Editor"){
            return view('beranda', compact('article'));
        }
    }
}
