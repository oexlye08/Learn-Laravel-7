@extends('layout.master', ['title' => 'All post'])
{{-- @extends('layouts.app', ['title' => 'All post']) --}}

@section('content')
    <div class="container" >
        <div class="d-flex justify-content-between">
            <div class="title">
                @isset($category)
                    Category : {{ $category->name }}
                @endisset
                @isset($tag)
                    Tag : {{ $tag->name }}
                @endisset

                @if (!isset($tag) && !isset($category))
                    All Post
                @endif
                
            </div>
            <div class="button mt-5">
                @if (Auth::check())
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">New Post</a>
                @endif
            </div>

        </div>
        
        <div class="row">
                
                @forelse ($gets as $get)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            {{ $get->title }}
                        </div>
                        <div class="card-body">
                            <div>
                                {{ Str::limit($get->body, 100, '.' )}}
                            </div>
                            <a href="post/{{ $get->slug }}">Read more</a>    
                            
                        </div>
                        
                        <div class="card-footer d-flex justify-content-between">
                            Publish on {{ $get->created_at->format('d F, Y') }} 
                            
                            @auth
                            <a href="/post/{{ $get->slug }}/edit" class="btn btn-sm btn-success">Edit</a>
                            @endauth
                            
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-3">
                    <div class="alert alert-info">
                        Ther's no place like 127.0.0.1
                    </div>
                </div>

                @endforelse
                
        </div>

        <div class="d-flex justify-content-center">
            <div>
                {{ $gets->links() }}
            </div>

        </div>
  
    </div>
@endsection