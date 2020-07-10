<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $gets = $category->gets()->paginate(6);
        return view('post.index', compact('gets', 'category'));
    }
}
