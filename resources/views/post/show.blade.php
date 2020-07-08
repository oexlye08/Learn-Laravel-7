@extends('layout.master', ['title' => $get->title])
{{-- @section('title', $get->title) --}}


@section('content')
    <div class="container">
        <div class="title">
            <h1>
                {{ $get->title }}
            </h1>
            <h2>
                {{ $get->created_at->diffForHumans() }}
                <!--untuk mengganti format ke dalam bahasa indonesia ke Config/App.php -> locale-->
            </h2>
                        
        </div>  
        <p>
            {{ $get->body }}
        </p>
    </div>
@endsection