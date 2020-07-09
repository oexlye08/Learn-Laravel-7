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
        <div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
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
        </div>
    </div>
@endsection