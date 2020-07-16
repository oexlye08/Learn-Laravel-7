<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show(Tag $tag)
    {
        $gets = $tag->gets()->latest()->paginate(6);
        return view('post.index', compact('gets', 'tag'));
    }
}
