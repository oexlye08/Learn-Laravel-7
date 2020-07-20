<?php

namespace App\Http\Controllers;

use App\Get;
use Illuminate\Http\Request;
class SearchController extends Controller
{
    public function get()
    {
        $query = request('query');
        $gets = Get::where("title", "like", "%$query%")->latest()->paginate(6);
        return view('post.index', compact('gets'));
    }
}
