<?php

namespace App\Http\Controllers;

use App\Get;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('post.index', [
            'gets' => Get::with('author', 'category', 'tags')->latest()->limit(10)->get(),
        ]);
    }
}
