@extends('layout.master', ['title' => 'Creat a post'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">New Post</div>
                <div class="card-body">
                    <form action="/post/store" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('post.partials.form-control', [$submit = 'Create'])
                    </form>
                </div>
             
            </div>
        </div>
    </div>
</div>
    
@endsection 