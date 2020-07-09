@extends('layout.master', ['title' => 'All post'])

@section('content')
    <div class="container" >
        <div class="d-flex justify-content-between">
            <div class="title">
                All Post
            </div>
            <div class="button mt-5">
                <a href="/post/create" class="btn btn-primary">New Post</a>
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

                            <a href="/post/{{ $get->slug }}">Read more</a>
                        </div>
                        
                        <div class="card-footer d-flex justify-content-between">
                            Publish on {{ $get->created_at->format('d F, Y') }} 
                            <a href="/post/{{ $get->slug }}/edit" class="btn btn-sm btn-success">Edit</a>
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