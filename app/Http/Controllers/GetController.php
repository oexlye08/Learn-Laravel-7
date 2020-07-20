<?php

namespace App\Http\Controllers;

use App\{Category, Get, Tag};
use App\Http\Requests\GetRequest;
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
        $gets =  Get::where('category_id', $get->category_id)->latest()->limit(6)->get();
        return view ('post.show', compact('get', 'gets'));
    } 

    public function create()
    {
        
        return view('post.create', [
            'get'=> new Get(),
            'categories' => Category::get(),
            'tags' => Tag::get()
            ]);
    }

    
    public function storeOld()
    {
        //validate the field
        $attr = $this->validateRequest();

        //Assign title to slug
        $slug = \Str::slug(request('title'));
        $attr['slug'] = $slug;

        // $thumbnail = request()->file('thumbnail');
        // $thumbnailUrl = $thumbnail->storeAs("images/post", "{$slug}.{$thumbnail->extension()}");

        $thumbnail = request()->file('thumbnail') ? request()->file('thumbnail')->store("images/post") : null;

        //Assign category
        $attr['category_id'] = request('category');
        //Assign images
        $attr['thumbnail'] = $thumbnailUrl;

        //Create post to database
        $get = auth()->user()->gets()->create($attr);
        // $get = Get::create($attr);
        $get->tags()->attach(request('tags'));

        session()->flash('success', 'The post success to create');
        // session()->flash('error', 'The post failed to create');

        //redirect
        return redirect()->to('post');
    }

    public function store(GetRequest $request)
    {
        $request->validate([
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);
        //validate the field
        $attr = $request->all();

        //Assign title to slug
        $slug = \Str::slug(request('title'));
        $attr['slug'] = $slug;

        // $thumbnail = request()->file('thumbnail');
        // $thumbnailUrl = $thumbnail->storeAs("images/post", "{$slug}.{$thumbnail->extension()}");

        $thumbnail = request()->file('thumbnail') ? request()->file('thumbnail')->store("images/post") : null;

        //Assign category
        $attr['category_id'] = request('category');
        //Assign images
        $attr['thumbnail'] = $thumbnail;

        //Create post to database
        $get = auth()->user()->gets()->create($attr);
        // $get = Get::create($attr);
        $get->tags()->attach(request('tags'));

        session()->flash('success', 'The post success to create');
        // session()->flash('error', 'The post failed to create');

        //redirect
        return redirect()->to('post');
    }

    // public function store(Request $request)
    // {
    // //  $post = new Get;  
    // //  $post->title = $request->title;
    // //  $post->slug = \Str::slug($request->title);
    // //  $post->body = $request->body;
    // //  $post->save();

    //     // Get::create([
    //     //     'title' => $request->title,
    //     //     'slug' => \Str::slug($request->title),
    //     //     'body' => $request->body,
    //     // ]);

    //     $post = $request->all();
    //     $post['slug'] = \Str::slug($request->title);
    //     Get::create($post);

    //  return redirect()->to('post');
    // }

    public function edit(Get $get)
    {
        // return view('post.edit', compact('get'));
        return view('post.edit', [
            'get' => $get,
            'categories' => Category::get(),
            'tags' => Tag::get()
        ]);
    }

    public function update(GetRequest $request, Get $get)
    {
        //this is from pilicy
        $this->authorize('update', $get);

        $request->validate([
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);

        if(request()->file('thumbnail')){
            \Storage::delete($get->thumbnail);
            $thumbnail = request()->file('thumbnail')->store("images/post");
        }else{
            $thumbnail = $get->thumbnail;
        }

        
        //validate the field
        $attr = $request->all();
        $attr['category_id'] = request('category');
        $attr['thumbnail'] = $thumbnail;

        $get -> update($attr);
        $get->tags()->sync(request('tags'));

        session()->flash('success', 'The post success to edit');

        //redirect
        return redirect()->to('post');
    }

    public function destroyed(Get $get) 
    {

        // if (auth()->user()->is($get->author)) {
             
        //     $get->tags()->detach();
        //     $get->delete();
        //     session()->flash('success', 'The post has ben destroyed');
        //     return redirect()->to('post');
        // } else {
        //     session()->flash("error", "You can't delete this post");
        //     return redirect()->to('post');
        // }

        \Storage::delete($get->thumbnail);
        $this->authorize('update', $get);
        $get->tags()->detach();
        $get->delete();
        session()->flash('success', 'The post has ben destroyed');
        return redirect()->to('post');
       
    } 

    public function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'tags' => 'array|required',
        ]);
    }

   
    
}
