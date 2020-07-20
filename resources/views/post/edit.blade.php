@extends('layout.master', ['title' => 'edit a post'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Post : {{ $get->title }}</div>
                <div class="card-body">
                    <form action="/post/{{ $get->slug }}/edit" method="post" autocomplete="off" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        @include('post.partials.form-control')
                    </form>
                </div>
             
            </div>
        </div>
    </div>
</div>
    
@endsection