@extends('layout.master', ['title' => 'Home'])
{{-- @section('title', 'Home') --}}
@section('content')
<div class="container">
    <div class="title m-b-md">
        Welcome home
    </div>  

    My name is {{ $name }}
</div>
@endsection