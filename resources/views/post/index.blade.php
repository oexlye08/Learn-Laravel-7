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
        </div>
        
        <div class="row">
            <div class="col-md-7">             
                <div class="card mb-4">
                        @forelse ($gets as $get)
                            <div>
                                <a href="{{ route('posts.show', $get->slug )}}">
                                    @if ($get->thumbnail)
                                        <img style="height: 400px; object-fit: cover; object-position: center;"
                                        src="{{ asset($get->getThumbnail()) }}" class="card-img-top">
                                    @else
                                        <img style="height: 400px; object-fit: cover; object-position: center;"
                                        class="card-img-top" src="{{ asset("/storage/images/post/default-image.jpg") }}" alt="">
                                    @endif
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <a href="{{ route('categories.show', $get->category->slug ) }}" class="text-secondary">
                                        <small>
                                            {{ $get->category->name . ' - ' }}
                                        </small>
                                    </a>
                                    
                                    @foreach ($get->tags as $tag)
                                        <a href="{{ route('tags.show', $tag->slug ) }}" class="text-secondary">
                                            <small>
                                                {{ $tag->name  }}
                                            </small>
                                        </a>   
                                    @endforeach
                                </div>
                                <h5>
                                    <a class="text-dark" href="{{ route('posts.show', $get->slug )}}" class="card-title">
                                        {{ $get->title }}
                                    </a>
                                </h5>
                                
                                <div class="text-secondary my-2 ">
                                    {{ Str::limit($get->body, 140, '.' )}}
                                </div>
                                <div class="d-flex justify-content-between align-items-center  mt-2">
                                    <div class="media align-items-center">
                                        <img width="40" class="rounded-circle mr-3" src="{{ $get->author->gravatar() }}" alt="">
                                        <div class="media-body">
                                            <div>
                                                {{ $get->author->name }}
                                            </div>
                                            
                                        </div>  
                                    </div> 
                                    <div class="text-secondary">
                                        <small>
                                            Publish on {{ $get->created_at->format('d F, Y') }} 
                                        </small>
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
            </div>
        </div>
@endsection