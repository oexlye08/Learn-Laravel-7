<?php

namespace App\Http\Controllers;

use App\Get;
use Illuminate\Http\Request;

class GetController extends Controller
{
    // public function index(Get $get)
    // {
    //     return view('post.get', compact('get'));
    // }

    public function index()
    {
        // $gets =  Get::paginate(3);

        // return view('post.index', ['gets'=> $gets]);

        return view('post.index', [
            'gets' => Get::latest()->paginate(6),
        ]);
    }

    public function show(Get $get)
    {
        return view ('post.show', compact('get'));
    } 

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
     $post = new Get;  
     $post->title = $request->title;
     $post->slug = \Str::slug($request->title);
     $post->body = $request->body;
     $post->save();

     return redirect()->to('post');
    }
}
