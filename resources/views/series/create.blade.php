@extends('layout.master', ['title'=> $serie -> title])
{{-- @section('title', $serie -> title) --}}


@section('content')
    <div class="container">
        <div class="title">
            {{ $serie -> title }}
        </div>
    </div>
@endsection 