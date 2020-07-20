@extends('layout.master', ['title' => $get->title])
{{-- @section('title', $get->title) --}}


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @if ($get->thumbnail)
                    <img style="height: 500px; object-fit: cover; object-position: center;"
                    src="{{ asset($get->getThumbnail()) }}" class="rounded w-100">
                @endif
                <div class="title">
                    <h1>
                        {{ $get->title }}
                    </h1>
                    <div class="text-secondary">
                        <h5>
                            <a href="/categories/{{ $get->category->slug }}">
                                {{ $get->category->name }}
                            </a>
                            &middot;
                            {{ $get->created_at->diffForHumans() }}
                            <!--untuk mengganti format ke dalam bahasa indonesia ke Config/App.php -> locale-->
                            &middot;
                            @foreach ($get->tags as $tag)
                                <a href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
                            @endforeach
                        </h5>
                    </div>
                </div> 
                <div class="media my-3">
                    <img width="60" class="rounded-circle mr-3" src="{{ $get->author->gravatar() }}" alt="">
                    <div class="media-body">
                        <div>
                            {{ $get->author->name }}
                        </div>
                        {{'@'. $get->author->username }}
                        
                    </div>  
                </div> 
                <hr>
                <p>
                    {!! nl2br($get->body) !!}
                </p>
                
                @can('update', $get)
                <div class="flex mt-3">
                    {{-- @if(auth()->user()->is($get->author))  --}}
                    
                                <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">
                            Delete
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        {{ $get->title }}
                                    </div>
                                    <div class="text-secondary">
                                        <small>{{ $get->created_at }}</small>
                                        
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <form action="/post/{{ $get->slug }}/delete" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger">Delete this</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    {{-- @endif --}}

                        <a href="/post/{{ $get->slug }}/edit" class="btn btn-sm btn-success">Edit</a>
                </div>
                @endcan
            </div>
            <div class="col-md-4">
                @foreach ($gets as $get)
                    <div class="card mb-4">
                        
                        <div>
                            <a href="{{ route('posts.show', $get->slug )}}">
                                @if ($get->thumbnail)
                                    <img style="height: 200px; object-fit: cover; object-position: center;"
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
                    </div>
                @endforeach    
            </div>     
        </div>       
    </div>
@endsection